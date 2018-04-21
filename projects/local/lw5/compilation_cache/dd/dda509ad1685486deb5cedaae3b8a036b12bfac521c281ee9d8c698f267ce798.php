<?php

/* sidebar.twig */
class __TwigTemplate_9a0a38b084e9a162d067e5d46cbf75504d359077033a311b435d4d72bccbab67 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
            'sidebar' => array($this, 'block_sidebar'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div>";
        $this->displayBlock('sidebar', $context, $blocks);
        echo "</div>
";
    }

    public function block_sidebar($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "sidebar.twig";
    }

    public function getDebugInfo()
    {
        return array (  24 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "sidebar.twig", "D:\\Studies\\Web\\projects\\local\\lw5\\templates\\sidebar.twig");
    }
}
