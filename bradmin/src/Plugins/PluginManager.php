<?php

namespace Bradmin\Plugins;


class PluginManager
{

    public function getInstalledPlugins() {
        $pluginDirectories = array_filter(glob(dirname(__FILE__).'/*'), 'is_dir');

        $pluginServiceProviders = [];

        foreach ($pluginDirectories as $pluginDirectory){
            $providersPath = $pluginDirectory.'/Providers';
            if ($handle = opendir($providersPath)) {
                $pluginServiceProviders[basename($pluginDirectory)]['directoryPath']=$pluginDirectory;
                while (false !== ($file = readdir($handle))) {
                    if(preg_match("|.php|",$file)){
                        $pluginServiceProviders[basename($pluginDirectory)]['providers'][$file]['path']= $providersPath.'/'.$file;

                        $docComments = array_filter(
                            token_get_all( file_get_contents( $providersPath.'/'.$file ) ), function($entry) {
                            return $entry[0] == T_DOC_COMMENT;
                        }
                        );
                        $fileDocComment = array_shift( $docComments )[1];
                        $commentRows = explode("\r\n", $fileDocComment);
                        foreach ($commentRows as $commentRow){
                            if(stripos ( $commentRow,':' )){
                                $commentRowParams = explode(":", $commentRow);
                                $commentParams[trim(ltrim(trim($commentRowParams[0]),'*'))]= trim($commentRowParams[1]);
                            }
                        }
                        if(isset($commentParams)) {
                            if (isset($commentParams['class'])) {
                                $pluginServiceProviders[basename($pluginDirectory)]['providers'][$file]['class'] = $commentParams['class'];
                            }
                            if (isset($commentParams['class'])) {
                                $pluginServiceProviders[basename($pluginDirectory)]['providers'][$file]['nameSpace'] = $commentParams['nameSpace'];
                            }
                        }
                    }
                }
                closedir($handle);
            }
        }
        return($pluginServiceProviders);
    }
}