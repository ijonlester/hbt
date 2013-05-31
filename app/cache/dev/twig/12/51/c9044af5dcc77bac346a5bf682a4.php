<?php

/* LLHBTBundle:Default:entryRowHeader.html.twig */
class __TwigTemplate_1251c9044af5dcc77bac346a5bf682a4 extends Twig_Template
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
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "cat"), "name"), "html", null, true);
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
        return array (  22 => 2,  19 => 1,);
    }
}
