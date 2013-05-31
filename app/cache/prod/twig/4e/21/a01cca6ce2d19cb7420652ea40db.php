<?php

/* LLHBTBundle:Default:entryRowSubtotal.html.twig */
class __TwigTemplate_4e21a01cca6ce2d19cb7420652ea40db extends Twig_Template
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
        echo "<div class=\"entry-row-subtotal\">
    <div class=\"entry-row-item close\"></div>
    <div class=\"entry-row-item date\"></div>
    <div class=\"entry-row-item type\"></div>
    <div class=\"entry-row-item note\"></div>
    <div class=\"entry-row-subtotal-item\">";
        // line 6
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (isset($context["subtotal"]) ? $context["subtotal"] : null), 2, ".", ","), "html", null, true);
        echo "</div>
</div>";
    }

    public function getTemplateName()
    {
        return "LLHBTBundle:Default:entryRowSubtotal.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  26 => 6,  36 => 7,  28 => 5,  22 => 2,  19 => 1,  88 => 18,  79 => 14,  76 => 13,  71 => 12,  65 => 8,  60 => 7,  57 => 6,  51 => 5,  41 => 13,  39 => 12,  35 => 10,  33 => 6,  23 => 3,  239 => 84,  235 => 82,  223 => 79,  219 => 78,  214 => 76,  210 => 75,  207 => 74,  204 => 73,  195 => 67,  189 => 64,  186 => 63,  172 => 62,  169 => 61,  155 => 60,  152 => 59,  149 => 57,  131 => 56,  128 => 55,  110 => 54,  108 => 53,  102 => 50,  96 => 46,  92 => 44,  90 => 43,  84 => 17,  80 => 38,  78 => 37,  72 => 36,  44 => 20,  40 => 8,  38 => 8,  32 => 6,  29 => 5,);
    }
}
