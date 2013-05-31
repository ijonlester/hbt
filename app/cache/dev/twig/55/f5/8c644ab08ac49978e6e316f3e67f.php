<?php

/* LLHBTBundle:Default:entryRow.html.twig */
class __TwigTemplate_55f58c644ab08ac49978e6e316f3e67f extends Twig_Template
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
        echo "<div class=\"entry-row\">
    <div class=\"entry-row-item close\">
        <div class=\"entry-row-delete\" entryId=\"";
        // line 3
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entry"), "id"), "html", null, true);
        echo "\">X</div>
    </div>
    <div class=\"entry-row-item date\">";
        // line 5
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "entry"), "date"), "date"), "Y-m-d"), "html", null, true);
        echo "</div>
    <div class=\"entry-row-item type\">";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entry"), "type"), "html", null, true);
        echo "</div>
    <div class=\"entry-row-item note\">";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entry"), "note"), "html", null, true);
        echo "</div>
    <div class=\"entry-row-item amount\">";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entry"), "amount"), "html", null, true);
        echo "</div>
</div>";
    }

    public function getTemplateName()
    {
        return "LLHBTBundle:Default:entryRow.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  40 => 8,  36 => 7,  32 => 6,  28 => 5,  23 => 3,  22 => 2,  19 => 1,);
    }
}
