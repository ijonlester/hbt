<?php

/* LLHBTBundle:Default:entryForm.html.twig */
class __TwigTemplate_ac0b619486366bcfe2a8535ffba76837 extends Twig_Template
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
        return array (  19 => 1,);
    }
}
