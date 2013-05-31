<?php

/* LLHBTBundle:Default:entryForm.html.twig */
class __TwigTemplate_e8ca5914d909d3a4f020b63f2fbf69aa extends Twig_Template
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
        echo "<div class=\"entry-form\">
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
</div>";
    }

    public function getTemplateName()
    {
        return "LLHBTBundle:Default:entryForm.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,  87 => 18,  83 => 17,  75 => 13,  70 => 12,  64 => 8,  59 => 7,  56 => 6,  50 => 5,  41 => 13,  39 => 12,  35 => 10,  33 => 6,  23 => 1,  216 => 85,  212 => 83,  200 => 80,  196 => 79,  191 => 77,  187 => 76,  184 => 75,  181 => 74,  172 => 68,  166 => 65,  163 => 64,  149 => 63,  146 => 61,  143 => 60,  140 => 59,  137 => 58,  134 => 57,  131 => 56,  113 => 55,  110 => 54,  108 => 53,  102 => 50,  96 => 46,  92 => 44,  90 => 43,  84 => 39,  80 => 38,  78 => 14,  72 => 36,  44 => 20,  40 => 9,  38 => 8,  32 => 4,  29 => 5,);
    }
}
