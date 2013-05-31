<?php

/* LLHBTBundle:Default:entryForm.html.twig */
class __TwigTemplate_0df2d0f35e438365b0b15630bd6fc826 extends Twig_Template
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
        echo "<!--div class=\"entry-form\">
    <form name=\"entry-form\" method=\"PUT\" action=\"/\">
        <div><label>Date*:</label><input type=\"text\" value=\"\" name=\"date\" class=\"datepicker\" required /></div>
        <div><label>Category*:</label><input type=\"text\" value=\"\" name=\"category\" class=\"autocomplete category\" required /></div>
        <div><label>Type*:</label><input type=\"text\" value=\"\" name=\"type\" class=\"autocomplete type\" required /></div>
        <div><label>Note:</label><input type=\"text\" value=\"\" name=\"note\" /></div>
        <div><label>Amount*:</label><input type=\"text\" value=\"\" name=\"amount\" required pattern=\"[0-9]{1,10}(\\.[0-9]{2})?\" /></div>
        <div class=\"entry-form-buttons\">
            <button name=\"entry-form-cancel\" class=\"entry-form-cancel\">Cancel</button>
            <button name=\"entry-form-save\" class=\"entry-form-save\">Save</button>
        </div>
    </form>
</div-->

<div id=\"entry-form\" class=\"entry-form\" title=\"Add Entries\">
\t<form name=\"entry-form\" method=\"PUT\" action=\"/\">
\t\t<table>
\t\t\t<tr>
\t\t\t\t<th></th>
\t\t\t\t<th>Date</th>
\t\t\t\t<th>Category</th>
\t\t\t\t<th>Type</th>
\t\t\t\t<th>Note</th>
\t\t\t\t<th>Amount</th>
\t\t\t\t<th></th>
\t\t\t</tr>
\t\t\t<tr>
\t\t\t\t<td></td>
\t\t\t\t<td><input type=\"text\" value=\"\" name=\"date[]\" class=\"datepicker\" required /></td>
\t\t\t\t<td><input type=\"text\" value=\"\" name=\"category[]\" class=\"autocomplete category\" required /></td>
\t\t\t\t<td><input type=\"text\" value=\"\" name=\"type[]\" class=\"autocomplete type\" required /></td>
\t\t\t\t<td><input type=\"text\" value=\"\" name=\"note[]\" /></td>
\t\t\t\t<td><input type=\"text\" value=\"\" name=\"amount[]\" required pattern=\"[0-9]{1,10}(\\.[0-9]{2})?\" /></td>
\t\t\t\t<td><img src=\"/web/bundles/llhbt/images/icon-add-entry.png\" width=\"22\" height=\"22\" alt=\"Add Row\" class=\"new-entry-row-add\" /></td>
\t\t\t</tr>
\t\t</table>
\t</form>
</div>";
    }

    public function getTemplateName()
    {
        return "LLHBTBundle:Default:entryForm.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,  88 => 18,  79 => 14,  76 => 13,  71 => 12,  65 => 8,  60 => 7,  57 => 6,  51 => 5,  41 => 13,  39 => 12,  35 => 10,  33 => 6,  23 => 1,  239 => 84,  235 => 82,  223 => 79,  219 => 78,  214 => 76,  210 => 75,  207 => 74,  204 => 73,  195 => 67,  189 => 64,  186 => 63,  172 => 62,  169 => 61,  155 => 60,  152 => 59,  149 => 57,  131 => 56,  128 => 55,  110 => 54,  108 => 53,  102 => 50,  96 => 46,  92 => 44,  90 => 43,  84 => 17,  80 => 38,  78 => 37,  72 => 36,  44 => 20,  40 => 9,  38 => 8,  32 => 4,  29 => 5,);
    }
}
