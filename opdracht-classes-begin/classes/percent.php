<?php
class percent
{
    public $absolute;
    public $relative;
    public $hundred;
    public $nominal;

    public function __construct($new,$unit)
    {

        $this->absolute = $this->formatNumber($new / $unit);
        $this->relative = $this->formatNumber($this->absolute - 1);
        $this->hundred = $this->formatNumber($this->absolute * 100);
        if ($this->absolute > 1) {
            $this->nominal = 'positive';
        } elseif ($this->absolute = 1) {
            $this->nominal = 'status-quo';
        } elseif ($this->absolute < 1) {
            $this->nominal = 'negative';
        }

    }

    public function formatNumber($number)
    {

        return number_format($number, 2, '.', ' ');
    }
}
?>