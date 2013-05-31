<?php

/* LLHBTBundle:Default:entryRowHeader.html.twig */
class __TwigTemplate_90d8f496a83f4ec0a3d7fd1c04a78cb3 extends Twig_Template
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
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entry"]) ? $context["entry"] : $this->getContext($context, "entry")), "category"), "html", null, true);
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
        return array (  22 => 2,  19 => 1,  133 => 38,  121 => 35,  117 => 34,  110 => 31,  107 => 30,  98 => 24,  84 => 23,  82 => 21,  77 => 20,  74 => 19,  71 => 18,  68 => 17,  50 => 16,  48 => 15,  39 => 8,  37 => 7,  32 => 4,  29 => 3,);
    }
}
