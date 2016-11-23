<?php
class HTMLbuilder{
    protected $header;
    protected $body;
    protected $footer;

    public function __construct($header, $body, $footer)
    {
        $this->header=$header;
        $this->body=$body;
        $this->footer=$footer;
    }

    public function buildHeader(){
        include 'html/'.$this->header;

    }
    public function buildBody(){
        include 'html/'.$this->body;

    }
    public function buildFooter(){
        include 'html/'.$this->footer;

    }
    public function findFiles($dir,$file){
        return glob($dir . '/*.' . $file);
    }
    public function buildJsLinks(){
        $this->findFiles('js','js');
    }
    public function buildCssLinks(){
        $this->findFiles('CSS','css');
    }
}
?>