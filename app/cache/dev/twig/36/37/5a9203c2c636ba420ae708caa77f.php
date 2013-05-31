<?php

/* LLHBTBundle:Default:index.html.twig */
class __TwigTemplate_36375a9203c2c636ba420ae708caa77f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("LLHBTBundle:Default:base.html.twig");

        $this->blocks = array(
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "LLHBTBundle:Default:base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "    <div id=\"main-outer\">
        <div id=\"main-outer-header\">Household Budget Tracker</div>
        <div id=\"main-inner\">
            <div id=\"main-inner-entry-form\">
                ";
        // line 8
        $this->env->loadTemplate("LLHBTBundle:Default:entryForm.html.twig")->display($context);
        // line 9
        echo "                <div id=\"add-entry-button\">
                    <div id=\"add-entry-icon\">
                        <img src=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/llhbt/images/icon-add-entry.png"), "html", null, true);
        echo "\" width=\"22\" height=\"22\" alt=\"Add Entry\" />
                    </div>
                    Add Entry
                </div>
            </div>
            <div id=\"main-inner-header\">
                <select name=\"entry-filter\" id=\"entry-filter\">
                    <option value\"\">Filter by...</option>
                    <option value=\"today\">Today</option>
                    <option value=\"this-week\">This Week</option>
                    <option value=\"this-month\">This Month</option>
                    <option value=\"this-year\">This Year</option>
                    <option value=\"past-week\">Past Week</option>
                    <option value=\"past-month\">Past Month</option>
                    <option value=\"past-year\">Past Year</option>
                    <option value=\"custom\">Custom...</option>
                </select>
                <div id=\"entry-filter-custom\">
                    <input type=\"text\" size=\"10\" name=\"start-date\" id=\"entry-filter-custom-start\" class=\"datepicker\" />
                    <input type=\"text\" size=\"10\" name=\"end-date\" id=\"entry-filter-custom-end\" class=\"datepicker\" />
                    <input type=\"button\" name=\"entry-filter-custom-button\" id=\"entry-filter-custom-button\" value=\"Search\" />
                </div>
            </div>
            <div id=\"main-inner-body\">
                <div id=\"main-inner-body-header\">
                    ";
        // line 36
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "range"), "start"), "M. j, Y"), "html", null, true);
        echo " to ";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "range"), "end"), "M. j, Y"), "html", null, true);
        echo "
                    ";
        // line 37
        if ((twig_length_filter($this->env, $this->getContext($context, "entries")) > 0)) {
            // line 38
            echo "                    <div id=\"main-inner-body-togglereport\" class=\"ui-state-default ui-corner-all\" title=\"Toggle Report View\"><span class=\"ui-icon ui-icon-image\"></span></div>
                    ";
        }
        // line 39
        echo "   
                </div>
                

                ";
        // line 43
        if ((twig_length_filter($this->env, $this->getContext($context, "entries")) == 0)) {
            // line 44
            echo "                    <div id=\"main-inner-body-noentries\">There are no entries within date range.</div>
                ";
        } else {
            // line 46
            echo "                    <div id=\"main-inner-body-chart-block\">
                        <div id=\"main-inner-body-chart-controls\"></div>
                        <div id=\"main-inner-body-chart\"></div>
                        <div id=\"main-inner-body-chart-loading\">
                            <img src=\"";
            // line 50
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/llhbt/images/ajax-loader.gif"), "html", null, true);
            echo "\" width=\"66\" height=\"66\" alt=\"Loading...\" />
                        </div>
                    </div>
                    ";
            // line 53
            $context["total"] = 0;
            // line 54
            echo "                    ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "entries"));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["cat"]) {
                // line 55
                echo "                        ";
                $this->env->loadTemplate("LLHBTBundle:Default:entryRowHeader.html.twig")->display(array_merge($context, array("cat" => $this->getContext($context, "cat"))));
                // line 56
                echo "                        ";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "cat"), "entries", array(), "array"));
                $context['loop'] = array(
                  'parent' => $context['_parent'],
                  'index0' => 0,
                  'index'  => 1,
                  'first'  => true,
                );
                if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                    $length = count($context['_seq']);
                    $context['loop']['revindex0'] = $length - 1;
                    $context['loop']['revindex'] = $length;
                    $context['loop']['length'] = $length;
                    $context['loop']['last'] = 1 === $length;
                }
                foreach ($context['_seq'] as $context["_key"] => $context["entry"]) {
                    // line 57
                    echo "                        \t";
                    $this->env->loadTemplate("LLHBTBundle:Default:entryRow.html.twig")->display(array_merge($context, array("entry" => $this->getContext($context, "entry"))));
                    // line 59
                    echo "                        \t";
                    $context["total"] = ($this->getContext($context, "total") + $this->getAttribute($this->getContext($context, "entry"), "amount"));
                    // line 60
                    echo "                        ";
                    ++$context['loop']['index0'];
                    ++$context['loop']['index'];
                    $context['loop']['first'] = false;
                    if (isset($context['loop']['length'])) {
                        --$context['loop']['revindex0'];
                        --$context['loop']['revindex'];
                        $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entry'], $context['_parent'], $context['loop']);
                $context = array_merge($_parent, array_intersect_key($context, $_parent));
                // line 61
                echo "                        ";
                $this->env->loadTemplate("LLHBTBundle:Default:entryRowSubtotal.html.twig")->display(array_merge($context, array("subtotal" => $this->getAttribute($this->getContext($context, "cat"), "subtotal", array(), "array"))));
                // line 62
                echo "                    ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cat'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 63
            echo "                    <div class=\"entry-row-total\">
                        Total: ";
            // line 64
            echo twig_escape_filter($this->env, $this->getContext($context, "total"), "html", null, true);
            echo "
                    </div>
                ";
        }
        // line 67
        echo "            </div>
            <div id=\"main-inner-footer\">&copy;2013 Jon Lester</div>
        </div>
    </div>

";
    }

    // line 73
    public function block_javascripts($context, array $blocks = array())
    {
        // line 74
        echo "    <script>
    var dateStart = '";
        // line 75
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "range"), "start"), "Y-m-d"), "html", null, true);
        echo "';
    var dateEnd = '";
        // line 76
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "range"), "end"), "Y-m-d"), "html", null, true);
        echo "';
    var categories = [
        ";
        // line 78
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "categories"));
        foreach ($context['_seq'] as $context["_key"] => $context["cat"]) {
            // line 79
            echo "            {'label':'";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "cat"), "label"), "html", null, true);
            echo "', 'category':'";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "cat"), "category"), "html", null, true);
            echo "'},

        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cat'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 82
        echo "    ];
    </script>
    ";
        // line 84
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
";
    }

    public function getTemplateName()
    {
        return "LLHBTBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  239 => 84,  235 => 82,  223 => 79,  219 => 78,  214 => 76,  210 => 75,  207 => 74,  204 => 73,  195 => 67,  189 => 64,  186 => 63,  172 => 62,  169 => 61,  155 => 60,  152 => 59,  149 => 57,  131 => 56,  128 => 55,  110 => 54,  108 => 53,  102 => 50,  96 => 46,  92 => 44,  90 => 43,  84 => 39,  80 => 38,  78 => 37,  72 => 36,  44 => 11,  40 => 9,  38 => 8,  32 => 4,  29 => 3,);
    }
}
