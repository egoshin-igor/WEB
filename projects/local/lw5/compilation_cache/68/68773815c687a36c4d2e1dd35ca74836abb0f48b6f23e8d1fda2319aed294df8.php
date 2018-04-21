<?php

/* header.twig */
class __TwigTemplate_492e42413ccc61472ff38f1bc83db8f3fbcc8c421bdc07154bfdf6ecc81cd9a9 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
            'header' => array($this, 'block_header'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div class=\"container\">
    <div class=\"row\">
        <header class=\"header\">
            ";
        // line 4
        $this->displayBlock('header', $context, $blocks);
        // line 7
        echo "        </header>
    </div>
</div>

";
    }

    // line 4
    public function block_header($context, array $blocks = array())
    {
        // line 5
        echo "                <h4>BooksLibrary</h4>
            ";
    }

    public function getTemplateName()
    {
        return "header.twig";
    }

    public function getDebugInfo()
    {
        return array (  42 => 5,  39 => 4,  31 => 7,  29 => 4,  24 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "header.twig", "D:\\Studies\\Web\\projects\\local\\lw5\\templates\\header.twig");
    }
}
