<?php

/* book.twig */
class __TwigTemplate_d6312a945d77a6b3a88eb7250525ce665547b99b491d9156f81f6d7ae6ec889a extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div class=\"wrapper_book\">
    <div class=\"book\">
        <img src=\"";
        // line 3
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["book"] ?? null), "imagePath", array()), "html", null, true);
        echo "\" alt=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["book"] ?? null), "name", array()), "html", null, true);
        echo "\" class=\"book_img\">
        <h6 class=\"book_name\">";
        // line 4
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["book"] ?? null), "name", array()), "html", null, true);
        echo "</h6>
        <p class=\"book_author\">";
        // line 5
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["book"] ?? null), "author", array()), "html", null, true);
        echo "</p>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "book.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  37 => 5,  33 => 4,  27 => 3,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "book.twig", "D:\\Studies\\Web\\projects\\local\\lw5\\templates\\book.twig");
    }
}
