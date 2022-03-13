<?php


    class CBR
    {
        
        private $research = array('google', 'google maps', 'google news', 'google earth', 'google voice', 'google photos', 'google images', 'for google chrome', 'google chrome','google reverse image search', 'google sites', 'google earth pro', 'google sites', 'google chromecast', 'google express');
        private $Translation = array('google translate ', 'google traductor', 'google translate spanish to english', 'google dictionary');
        private $scientific = array('google classroom', 'google scholar', 'google books', 'google history', 'google space', 'google underwater');
        private $Assistant = array('google docs ', 'google drive', 'google slides', 'google calendar', 'google sheets', 'google play', 'google mail', 'for google account', 'google sign in', 'google store', 'google documents', 'google login', 'google calculator', 'google passwords', 'google keep', 'google chrome download', 'google fonts', 'google speed test', 'google street view', 'google weather', 'google gmail', 'google alerts', 'google apps', 'google cloud', 'google app store', 'google logo', 'google remote desktop', 'google extensions', 'google timer', 'google account');
        private $serve =  array('google flights ', 'google forms', 'google fi', 'google trends', 'google pay', 'google domains' ,'google contacts', 'google wifi', 'google fiber', 'google jobs', 'google nest', 'google lens', 'google adsense', 'google nest hub', 'google travel', 'google hotels', 'google authenticat', 'google nest mini');
        private $entertainment = array('google doodle', 'google hangouts', 'google duo', 'google gravity', 'google music', 'google feud', 'google groups', 'google movies', 'google play music', 'google plus');
        private $Business = array('google analytics', 'google meet', 'google adwords', 'google ads', 'google finance', 'google my business', 'google business');
        private $smart_devices = array('google pixel 4', 'google pixel', 'google home hub', 'google glass');
        private $smart_assistant = array('google home', 'google home mini', 'google assistant');

        

        public function retrieve($Keyword, $Search_Volume, $Paid_Difficulty, $Search_Difficulty)
        {
            require 'db/connection.php';
            $loop = $cases->countData();
            for ($i=1; $i<= $loop ; $i++) 
            { 
               $result = $cases->get($i);
               $keywordSimilarity = $this->keywordSimilarity($Keyword,$result['Keyword']);
               $searhvSimilarity =  $this->searchvSim($Search_Volume,$result['Search_Volume']);
               $paidSimilarity = $this->difficultySim($Paid_Difficulty,$result['Paid_Difficulty']);
               $searchdSimilarity = $this->difficultySim($Search_Difficulty,$result['Search_Difficulty']);
               $similarities[$i] = ($keywordSimilarity+$searhvSimilarity+$paidSimilarity+$searchdSimilarity)/4;
            }

            return $similarities;
        }

        public function keywordSimilarity($keyword1,$keyword2)
        {
            if($keyword1==$keyword2)
            {
                return 1;
            } elseif( in_array($keyword1,$this->research) &&  in_array($keyword2,$this->research) )
           {
                return 0.9;
           } elseif (in_array($keyword1,$this->Translation) &&  in_array($keyword2,$this->Translation))
            {
                return 0.9;
            } elseif (in_array($keyword1,$this->scientific) &&  in_array($keyword2,$this->scientific))
            {
                return 0.9;
            } elseif (in_array($keyword1,$this->Assistant) &&  in_array($keyword2,$this->Assistant))
            {
                return 0.9;
            } elseif (in_array($keyword1,$this->serve) &&  in_array($keyword2,$this->serve))
            {
                return 0.9;
            } elseif (in_array($keyword1,$this->entertainment) &&  in_array($keyword2,$this->entertainment))
            {
                return 0.9;
            } elseif (in_array($keyword1,$this->Business) &&  in_array($keyword2,$this->Business))
            {
                return 0.9;
            } elseif (in_array($keyword1,$this->smart_devices) &&  in_array($keyword2,$this->smart_devices))
            {
                return 0.9;
            } elseif (in_array($keyword1,$this->smart_assistant) &&  in_array($keyword2,$this->smart_assistant))
            {
                return 0.9;
            } elseif ($keyword1=='')
            {
                return 0;
            }
             else
            {
                return 0.4;
            }
        }

        public function searchvSim($Search_Volume1,$Search_Volume2) 
        {
            if($Search_Volume1 == $Search_Volume2)
            {
                return 1;
            } elseif ($Search_Volume1=='')
            {
                return 0;
            }
            else
            {
                return  1-(abs($Search_Volume1-$Search_Volume2)-50000) / (100000000-50000);
            }
           
        }

        public function difficultySim($difficulty1,$difficulty2)
        {
            if($difficulty1 == $difficulty2)
            {
                return 1;
            } elseif ($difficulty1=='')
            {
                return 0;
            }
            else
            {
                return  1-(abs($difficulty1-$difficulty2)-1) / (100-1);
            }
        }


        public function similarCases($similarities)
        {
            arsort($similarities);
            $keys = array_keys($similarities); 
            $similarCases[0]= $keys[0];
            $similarCases[1]= $keys[1];
            $similarCases[2]= $keys[2];
            return $similarCases;
        }

        


    }


?>