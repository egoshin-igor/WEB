<?php

/* base.twig */
class __TwigTemplate_1bb78a0904bb7737682ca234ba8127640657e17870a0ba07b12bbedfb7f3b2aa extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        ";
        // line 4
        $this->displayBlock('head', $context, $blocks);
        // line 11
        echo "    </head>
    <body>
        ";
        // line 13
        echo twig_include($this->env, $context, "header.twig");
        echo "
        ";
        // line 14
        echo twig_include($this->env, $context, "sidebar.twig");
        echo "
        <div class=\"container\">";
        // line 15
        $this->displayBlock('content', $context, $blocks);
        echo "</div>
        ";
        // line 16
        echo twig_include($this->env, $context, "footer.twig");
        echo "
    </body>
</html>";
    }

    // line 4
    public function block_head($context, array $blocks = array())
    {
        // line 5
        echo "            <meta charset=\"UTF-8\">
            <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
            <link rel=\"stylesheet\" href=\"www/css/style.css\">
            <link rel=\"stylesheet\" href=\"www/css/bootstrap.css\">
            <title>";
        // line 9
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
    }

    public function block_title($context, array $blocks = array())
    {
    }

    // line 15
    public function block_content($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "base.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  75 => 15,  65 => 9,  59 => 5,  56 => 4,  49 => 16,  45 => 15,  41 => 14,  37 => 13,  33 => 11,  31 => 4,  26 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "base.twig", "D:\\Studies\\Web\\projects\\local\\lw5\\templates\\base.twig");
    }
}
