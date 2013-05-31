<?php

/* LLHBTBundle:Default:entryRowHeader.html.twig */
class __TwigTemplate_8b9e8d5787e89fccb8e2155d07607669 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div class=\"entry-row-header\">
    <div class=\"entry-row-header-item\">";
        // line 2
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["cat"]) ? $context["cat"] : null), "name"), "html", null, true);
        echo "</div>
</div>";
    }

    public function getTemplateName()
    {
        return "LLHBTBundle:Default:entryRowHeader.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  22 => 2,  19 => 1,  88 => 18,  79 => 14,  76 => 13,  71 => 12,  65 => 8,  60 => 7,  57 => 6,  51 => 5,  41 => 13,  39 => 12,  35 => 10,  33 => 6,  23 => 1,  239 => 84,  235 => 82,  223 => 79,  219 => 78,  214 => 76,  210 => 75,  207 => 74,  204 => 73,  195 => 67,  189 => 64,  186 => 63,  172 => 62,  169 => 61,  155 => 60,  152 => 59,  149 => 57,  131 => 56,  128 => 55,  110 => 54,  108 => 53,  102 => 50,  96 => 46,  92 => 44,  90 => 43,  84 => 17,  80 => 38,  78 => 37,  72 => 36,  44 => 20,  40 => 9,  38 => 8,  32 => 4,  29 => 5,);
    }
}
