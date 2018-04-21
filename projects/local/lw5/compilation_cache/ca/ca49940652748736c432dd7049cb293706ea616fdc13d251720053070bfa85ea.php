<?php

/* footer.twig */
class __TwigTemplate_db7fef1025b03e2ee9f8ffde46f5d5867632ab491b1cdbea014fcec4992f50f5 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
            'footer' => array($this, 'block_footer'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div class=\"container\">
    <div class=\"row\">
        <div class=\"footer\">
            ";
        // line 4
        $this->displayBlock('footer', $context, $blocks);
        // line 7
        echo "        </div>
    </div>
</div>";
    }

    // line 4
    public function block_footer($context, array $blocks = array())
    {
        // line 5
        echo "                <p class=\"copyright\">&copy;Copyright 2018</p>
            ";
    }

    public function getTemplateName()
    {
        return "footer.twig";
    }

    public function getDebugInfo()
    {
        return array (  40 => 5,  37 => 4,  31 => 7,  29 => 4,  24 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "footer.twig", "D:\\Studies\\Web\\projects\\local\\lw5\\templates\\footer.twig");
    }
}
