<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Accounts extends MY_Controller {

    public function index(){
        $key="ead6b2cd60844cc62611cad2ab76cc49";
        $url="http://api.filestube.com/?key=" . $key . "&phrase=kubuntu&page=2";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_FAILONERROR, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        $result = curl_exec($ch);
        print curl_error($ch);
        curl_close($ch);

        $document = new DOMDocument('1.0', 'UTF-8');
        $document->loadXML($result);
        $answer = $document->getElementsByTagName('answer')->item(0);
        if($answer!=null) {
            $hasResults = $answer->getElementsByTagName('hasResults')->item(0);
            if($hasResults->nodeValue == 1)
            {
                $hits = $answer->getElementsByTagName('hits');
                foreach($hits as $hit)
                {
                    $name = $hit->getElementsByTagName('name')->item(0)->nodeValue;
                    $extension = $hit->getElementsByTagName('extension')->item(0)->nodeValue;
                    $desc = $hit->getElementsByTagName('description')->item(0)->nodeValue;
                    $size = $hit->getElementsByTagName('size')->item(0)->nodeValue;
                    $link = $hit->getElementsByTagName('link')->item(0)->nodeValue;
                    $added = $hit->getElementsByTagName('added')->item(0)->nodeValue;
                    $related = $hit->getElementsByTagName('related')->item(0)->nodeValue;
                    $counter=$hit->getAttribute('id');
                    print '<div style="border:1px dotted #CCC;padding:10px;">';
                    print $counter."<br />";
                    print "Name : $name <br />";
                    print "Extension : $extension <br />";
                    print "Date added : $added <br />";
                    print "Description : $desc <br />";
                    print "Size : $size <br />";
                    print "Related : $related <br />";
                    print "<a href='$link' title='$name'>Details</a>";
                    print "</div>";
                }

            }
            else {
                 print '<div style="border:1px dotted #CCC;padding:10px;">';
                print '0 results <br />';
                print "</div>";
            }
        }
        else {
            $error = $document->getElementsByTagName('error')->item(0);
            if($error!=null){
                $message = $error->getElementsByTagName('message')->item(0)->nodeValue;
                print '<div style="border:1px dotted #CCC;padding:10px;">';
                print 'Message: '.$message."<br />";
                print "</div>";
            }
        }
    }

}