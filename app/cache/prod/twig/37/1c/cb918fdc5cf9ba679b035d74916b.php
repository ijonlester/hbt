<?php

/* LLHBTBundle:Default:base.html.twig */
class __TwigTemplate_371ccb918fdc5cf9ba679b035d74916b extends Twig_Template
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
</html>
";
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
        return array (  88 => 18,  79 => 14,  76 => 13,  71 => 12,  65 => 8,  60 => 7,  57 => 6,  51 => 5,  41 => 13,  39 => 12,  35 => 10,  33 => 6,  23 => 1,  239 => 84,  235 => 82,  223 => 79,  219 => 78,  214 => 76,  210 => 75,  207 => 74,  204 => 73,  195 => 67,  189 => 64,  186 => 63,  172 => 62,  169 => 61,  155 => 60,  152 => 59,  149 => 57,  131 => 56,  128 => 55,  110 => 54,  108 => 53,  102 => 50,  96 => 46,  92 => 44,  90 => 43,  84 => 17,  80 => 38,  78 => 37,  72 => 36,  44 => 20,  40 => 9,  38 => 8,  32 => 4,  29 => 5,);
    }
}
