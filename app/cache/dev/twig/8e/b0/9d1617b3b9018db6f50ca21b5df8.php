<?php

/* LLHBTBundle:Default:base.html.twig */
class __TwigTemplate_8eb09d1617b3b9018db6f50ca21b5df8 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 6
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 10
        echo "    </head>
    <body>
        ";
        // line 12
        $this->displayBlock('body', $context, $blocks);
        // line 13
        echo "        ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 20
        echo "        <div class=\"error\"></div>
    </body>
</html>";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo "Household Budget Tracker";
    }

    // line 6
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 7
        echo "        <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/llhbt/css/pepper-grinder/jquery-ui-1.10.1.custom.min.css"), "html", null, true);
        echo "\" type=\"text/css\" rel=\"stylesheet\" />
        <link href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/llhbt/css/main.css"), "html", null, true);
        echo "\" type=\"text/css\" rel=\"stylesheet\" />
        ";
    }

    // line 12
    public function block_body($context, array $blocks = array())
    {
    }

    // line 13
    public function block_javascripts($context, array $blocks = array())
    {
        // line 14
        echo "        <script src=\"//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js\"></script>
        <script src=\"//ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/jquery-ui.min.js\"></script>
        <script type=\"text/javascript\" src=\"https://www.google.com/jsapi\"></script>
        <script src=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/llhbt/js/main.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
        <script src=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/llhbt/js/chart.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
        ";
    }

    public function getTemplateName()
    {
        return "LLHBTBundle:Default:base.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  87 => 18,  83 => 17,  75 => 13,  70 => 12,  64 => 8,  59 => 7,  56 => 6,  50 => 5,  41 => 13,  39 => 12,  35 => 10,  33 => 6,  23 => 1,  216 => 85,  212 => 83,  200 => 80,  196 => 79,  191 => 77,  187 => 76,  184 => 75,  181 => 74,  172 => 68,  166 => 65,  163 => 64,  149 => 63,  146 => 61,  143 => 60,  140 => 59,  137 => 58,  134 => 57,  131 => 56,  113 => 55,  110 => 54,  108 => 53,  102 => 50,  96 => 46,  92 => 44,  90 => 43,  84 => 39,  80 => 38,  78 => 14,  72 => 36,  44 => 20,  40 => 9,  38 => 8,  32 => 4,  29 => 5,);
    }
}
