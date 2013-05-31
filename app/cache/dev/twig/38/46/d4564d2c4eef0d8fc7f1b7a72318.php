<?php

/* TwigBundle:Exception:logs.html.twig */
class __TwigTemplate_3846d4564d2c4eef0d8fc7f1b7a72318 extends Twig_Template
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
        echo "<ol class=\"traces logs\">
    ";
        // line 2
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "logs"));
        foreach ($context['_seq'] as $context["_key"] => $context["log"]) {
            // line 3
            echo "        <li";
            if (($this->getAttribute($this->getContext($context, "log"), "priority") >= 400)) {
                echo " class=\"error\"";
            } elseif (($this->getAttribute($this->getContext($context, "log"), "priority") >= 300)) {
                echo " class=\"warning\"";
            }
            echo ">
            ";
            // line 4
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "log"), "priorityName"), "html", null, true);
            echo " - ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "log"), "message"), "html", null, true);
            echo "
        </li>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['log'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 7
        echo "</ol>
";
    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:logs.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  91 => 20,  74 => 16,  66 => 15,  57 => 14,  55 => 13,  51 => 12,  36 => 7,  25 => 4,  105 => 24,  98 => 22,  93 => 20,  89 => 19,  83 => 18,  76 => 16,  68 => 12,  50 => 8,  33 => 5,  27 => 4,  24 => 3,  22 => 2,  225 => 96,  216 => 90,  205 => 84,  201 => 83,  194 => 79,  191 => 78,  189 => 77,  186 => 76,  180 => 72,  172 => 67,  163 => 63,  159 => 61,  157 => 60,  154 => 59,  147 => 55,  138 => 51,  136 => 50,  132 => 48,  130 => 47,  127 => 46,  121 => 45,  118 => 44,  114 => 43,  104 => 36,  100 => 34,  95 => 31,  75 => 27,  71 => 26,  63 => 24,  60 => 23,  58 => 9,  41 => 9,  34 => 11,  19 => 1,  94 => 39,  88 => 6,  81 => 40,  79 => 17,  59 => 22,  48 => 19,  39 => 6,  35 => 4,  31 => 5,  26 => 3,  21 => 2,  46 => 7,  43 => 7,  228 => 89,  224 => 87,  212 => 88,  208 => 83,  203 => 81,  199 => 80,  196 => 80,  193 => 78,  184 => 72,  178 => 71,  175 => 68,  161 => 67,  158 => 65,  155 => 64,  152 => 63,  149 => 62,  146 => 61,  143 => 54,  140 => 59,  137 => 58,  134 => 57,  116 => 56,  113 => 55,  110 => 54,  108 => 53,  102 => 50,  96 => 21,  92 => 44,  90 => 43,  84 => 19,  80 => 38,  78 => 28,  72 => 14,  44 => 10,  40 => 9,  38 => 8,  32 => 4,  29 => 3,);
    }
}
