<?php
    class Format{
        public function formatDate($date){
            return date('F j, Y, g:i a',strtotime($date));
        }
		public function ft($date){
            return date('F j, g:i a',strtotime($date));
        }
    }
?>