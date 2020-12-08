<?php

/* table/search/selection_form.twig */
class __TwigTemplate_ae11ba3c5f808d41e13ba2ca88956b667698f5f3c7ed8039f52a980eb5f80cdd extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        if ((($context["search_type"] ?? null) == "zoom")) {
            // line 2
            $this->loadTemplate("table/search/form_tag.twig", "table/search/selection_form.twig", 2)->display(["script_name" => "tbl_zoom_select.php", "form_id" => "zoom_search_form", "db" =>             // line 5
($context["db"] ?? null), "table" =>             // line 6
($context["table"] ?? null), "goto" =>             // line 7
($context["goto"] ?? null)]);
            // line 9
            echo "    <fieldset id=\"fieldset_zoom_search\">
        <fieldset id=\"inputSection\">
            <legend>";
            // line 12
            echo _gettext("Do a \"query by example\" (wildcard: \"%\") for two different columns");
            // line 13
            echo "            </legend>";
            // line 14
            $this->loadTemplate("table/search/fields_table.twig", "table/search/selection_form.twig", 14)->display(["self" =>             // line 15
($context["self"] ?? null), "search_type" =>             // line 16
($context["search_type"] ?? null), "geom_column_flag" =>             // line 17
($context["geom_column_flag"] ?? null), "column_names" =>             // line 18
($context["column_names"] ?? null), "column_types" =>             // line 19
($context["column_types"] ?? null), "column_collations" =>             // line 20
($context["column_collations"] ?? null), "criteria_column_names" =>             // line 21
($context["criteria_column_names"] ?? null), "criteria_column_types" =>             // line 22
($context["criteria_column_types"] ?? null)]);
            // line 24
            $this->loadTemplate("table/search/options_zoom.twig", "table/search/selection_form.twig", 24)->display(["data_label" =>             // line 25
($context["data_label"] ?? null), "column_names" =>             // line 26
($context["column_names"] ?? null), "max_plot_limit" =>             // line 27
($context["max_plot_limit"] ?? null)]);
            // line 29
            echo "        </fieldset>
    </fieldset>";
        } elseif ((        // line 31
($context["search_type"] ?? null) == "normal")) {
            // line 32
            $this->loadTemplate("table/search/form_tag.twig", "table/search/selection_form.twig", 32)->display(["script_name" => "tbl_select.php", "form_id" => "tbl_search_form", "db" =>             // line 35
($context["db"] ?? null), "table" =>             // line 36
($context["table"] ?? null), "goto" =>             // line 37
($context["goto"] ?? null)]);
            // line 39
            echo "    <fieldset id=\"fieldset_table_search\">
        <fieldset id=\"fieldset_table_qbe\">
            <legend>";
            // line 42
            echo _gettext("Do a \"query by example\" (wildcard: \"%\")");
            // line 43
            echo "            </legend>
            <div class=\"responsivetable jsresponsive\">";
            // line 45
            $this->loadTemplate("table/search/fields_table.twig", "table/search/selection_form.twig", 45)->display(["self" =>             // line 46
($context["self"] ?? null), "search_type" =>             // line 47
($context["search_type"] ?? null), "geom_column_flag" =>             // line 48
($context["geom_column_flag"] ?? null), "column_names" =>             // line 49
($context["column_names"] ?? null), "column_types" =>             // line 50
($context["column_types"] ?? null), "column_collations" =>             // line 51
($context["column_collations"] ?? null), "criteria_column_names" =>             // line 52
($context["criteria_column_names"] ?? null), "criteria_column_types" =>             // line 53
($context["criteria_column_types"] ?? null)]);
            // line 55
            echo "            </div>
            <div id=\"gis_editor\"></div>
            <div id=\"popup_background\"></div>
        </fieldset>";
            // line 59
            $this->loadTemplate("table/search/options.twig", "table/search/selection_form.twig", 59)->display(["column_names" =>             // line 60
($context["column_names"] ?? null), "max_rows" =>             // line 61
($context["max_rows"] ?? null)]);
            // line 63
            echo "    </fieldset>";
        } elseif ((        // line 64
($context["search_type"] ?? null) == "replace")) {
            // line 65
            $this->loadTemplate("table/search/form_tag.twig", "table/search/selection_form.twig", 65)->display(["script_name" => "tbl_find_replace.php", "form_id" => "find_replace_form", "db" =>             // line 68
($context["db"] ?? null), "table" =>             // line 69
($context["table"] ?? null), "goto" =>             // line 70
($context["goto"] ?? null)]);
            // line 72
            echo "    <fieldset id=\"fieldset_find_replace\">
        <fieldset id=\"fieldset_find\">
            <legend>";
            // line 75
            echo _gettext("Find and replace");
            // line 76
            echo "            </legend>";
            // line 77
            $this->loadTemplate("table/search/search_and_replace.twig", "table/search/selection_form.twig", 77)->display(["column_names" =>             // line 78
($context["column_names"] ?? null), "column_types" =>             // line 79
($context["column_types"] ?? null), "sql_types" =>             // line 80
($context["sql_types"] ?? null)]);
            // line 82
            echo "        </fieldset>
    </fieldset>";
        } else {
            // line 85
            $this->loadTemplate("table/search/form_tag.twig", "table/search/selection_form.twig", 85)->display(["script_name" => "", "form_id" => "", "db" =>             // line 88
($context["db"] ?? null), "table" =>             // line 89
($context["table"] ?? null), "goto" =>             // line 90
($context["goto"] ?? null)]);
        }
        // line 95
        echo "    <fieldset class=\"tblFooters\">
        <input type=\"submit\"
            name=\"";
        // line 97
        echo (((($context["search_type"] ?? null) == "zoom")) ? ("zoom_submit") : ("submit"));
        echo "\"";
        // line 98
        echo (((($context["search_type"] ?? null) == "zoom")) ? ("id=\"inputFormSubmitId\"") : (""));
        echo "
            value=\"";
        // line 99
        echo _gettext("Go");
        echo "\" />
    </fieldset>
</form>
<div id=\"sqlqueryresultsouter\"></div>
";
    }

    public function getTemplateName()
    {
        return "table/search/selection_form.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  130 => 99,  126 => 98,  123 => 97,  119 => 95,  116 => 90,  115 => 89,  114 => 88,  113 => 85,  109 => 82,  107 => 80,  106 => 79,  105 => 78,  104 => 77,  102 => 76,  100 => 75,  96 => 72,  94 => 70,  93 => 69,  92 => 68,  91 => 65,  89 => 64,  87 => 63,  85 => 61,  84 => 60,  83 => 59,  78 => 55,  76 => 53,  75 => 52,  74 => 51,  73 => 50,  72 => 49,  71 => 48,  70 => 47,  69 => 46,  68 => 45,  65 => 43,  63 => 42,  59 => 39,  57 => 37,  56 => 36,  55 => 35,  54 => 32,  52 => 31,  49 => 29,  47 => 27,  46 => 26,  45 => 25,  44 => 24,  42 => 22,  41 => 21,  40 => 20,  39 => 19,  38 => 18,  37 => 17,  36 => 16,  35 => 15,  34 => 14,  32 => 13,  30 => 12,  26 => 9,  24 => 7,  23 => 6,  22 => 5,  21 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "table/search/selection_form.twig", "D:\\phpstudy_pro\\WWW\\back\\public\\phpMyAdmin4.8.5\\templates\\table\\search\\selection_form.twig");
    }
}
