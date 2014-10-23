<?php
/*
 * @author Aaron Roman
 * Creado el 26/12/2011
 *
 * Heredamos la clase de lenguage y insertamos el uso de gettext para la
 * traduccion de los strings. También es el lugar donde creamos la sesión que usaremos en todo el site
 */
 class MY_gettext extends CI_Lang{
    function __construct()
    {     
        /* Obtenemos la sesión */
        if(!isset($_SESSION))
        {
            session_start();
        }

        /* Mantenemos libreria intacta */
        parent::__construct();

        //$_SESSION['se_lang'] = 'en_EN';

        //$language_explode = explode(',',$_SERVER['HTTP_ACCEPT_LANGUAGE']);
        //$lang = mb_strtolower($language_explode[0]);
       
        //$lang = LANG;
        
        if(empty($_SESSION['se_lang'])){
            $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
            
            switch ($lang){
                case "pt":
                    $_SESSION['se_lang'] = 'pt_BR';
                    break;
                case "br":
                    $_SESSION['se_lang'] = 'pt_BR';
                    break;
                case "pt-br":
                    $_SESSION['se_lang'] = 'pt_BR';
                    break;
                case "es-419":
                    $_SESSION['se_lang'] = 'es_ES';
                    break;
                case "es":
                    $_SESSION['se_lang'] = 'es_ES';
                    break;
                case "es-ar":
                    $_SESSION['se_lang'] = 'es_AR';
                    break;
                case "ar":
                    $_SESSION['se_lang'] = 'es_AR';
                    break;
                case "es-mx":
                    $_SESSION['se_lang'] = 'es_ES';
                    break;
                case "mx":
                    $_SESSION['se_lang'] = 'es_ES';
                    break;
                case "cl":
                    $_SESSION['se_lang'] = 'es_ES';
                    break;
                case "la":
                    $_SESSION['se_lang'] = 'es_ES';
                    break;
                case "co":
                    $_SESSION['se_lang'] = 'es_ES';
                    break;
                case "te":
                    $_SESSION['se_lang'] = 'es_ES';
                    break;
                case "ko":
                    $_SESSION['se_lang'] = 'es_ES';
                    break;
                case "en":
                    $_SESSION['se_lang'] = 'en_US';
                    break;
                case "us":
                    $_SESSION['se_lang'] = 'en_US';
                    break;
                case "de":
                    $_SESSION['se_lang'] = 'en_US';
                    break;
                case "ru":
                    $_SESSION['se_lang'] = 'en_US';
                    break;
                case "fr":
                    $_SESSION['se_lang'] = 'en_US';
                    break;
                case "it":
                    $_SESSION['se_lang'] = 'it_IT';
                    break;        
                default:
                    $_SESSION['se_lang'] = 'en_US';
                    break;
            }
        }

        $_SESSION['sub_lang'] = substr($_SESSION['se_lang'], 0, 2);
        
        /* Seteamos nuevo idioma */
        $directory  = APPPATH. 'language/locale/';
        $domain     = 'messages';
        
        putenv('LANG='.$_SESSION['se_lang'].'.UTF-8');
        setlocale(LC_ALL, $_SESSION['se_lang'].'.UTF-8');
        bindtextdomain($domain, $directory);
        textdomain($domain);
        bind_textdomain_codeset($domain, 'UTF-8');        
    }
 }
?>