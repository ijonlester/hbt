<?php

/* LLHBTBundle:Default:entryRowSubtotal.html.twig */
class __TwigTemplate_d68d103887ec37659d76dc3f53afa004 extends Twig_Template
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
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getContext($context, "subtotal"), 2, ".", ","), "html", null, true);
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
        return array (  26 => 6,  19 => 1,);
    }
}
