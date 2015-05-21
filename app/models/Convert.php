<?php
    class Convert extends Eloquent{
        protected $table = 'converted';
        
        public function saveItem($arrParams, $option = null)
        {
            $row = $this->where('code', '=', $arrParams['code'])->first();
            if (count($row) < 1)
                $row = new Convert();
            foreach ($arrParams as $key => $value)
                $row->{$key} = $value;
            $row->save();
        }

        public function getValue($code)
        {
            $row = $this->where('code', '=', $code)->first();
            if (count($row) > 0)
                return $row->value;
            else
                return 0;
        }
    }
?>