<?php

/* table/search/fields_table.twig */
class __TwigTemplate_c713d5fcdf2bf62f24ada67229881342b0e0b716f60a62f66999909286d51fb3 extends Twig_Template
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
        echo "<table class=\"data\"";
        echo (((($context["search_type"] ?? null) == "zoom")) ? (" id=\"tableFieldsId\"") : (""));
        echo ">";
        // line 2
        $this->loadTemplate("table/search/table_header.twig", "table/search/fields_table.twig", 2)->display(["geom_column_flag" =>         // line 3
($context["geom_column_flag"] ?? null)]);
        // line 5
        echo "    <tbody>";
        // line 6
        if ((($context["search_type"] ?? null) == "zoom")) {
            // line 7
            $this->loadTemplate("table/search/rows_zoom.twig", "table/search/fields_table.twig", 7)->display(["self" =>             // line 8
($context["self"] ?? null), "column_names" =>             // line 9
($context["column_names"] ?? null), "criteria_column_names" =>             // line 10
($context["criteria_column_names"] ?? null), "criteria_column_types" =>             // line 11
($context["criteria_column_types"] ?? null)]);
        } else {
            // line 14
            $this->loadTemplate("table/search/rows_normal.twig", "table/search/fields_table.twig", 14)->display(["self" =>             // line 15
($context["self"] ?? null), "geom_column_flag" =>             // line 16
($context["geom_column_flag"] ?? null), "column_names" =>             // line 17
($context["column_names"] ?? null), "column_types" =>             // line 18
($context["column_types"] ?? null), "column_collations" =>             // line 19
($context["column_collations"] ?? null)]);
        }
        // line 22
        echo "    </tbody>
</table>
";
    }

    public function getTemplateName()
    {
        return "table/search/fields_table.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  45 => 22,  42 => 19,  41 => 18,  40 => 17,  39 => 16,  38 => 15,  37 => 14,  34 => 11,  33 => 10,  32 => 9,  31 => 8,  30 => 7,  28 => 6,  26 => 5,  24 => 3,  23 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "table/search/fields_table.twig", "D:\\phpstudy_pro\\WWW\\back\\public\\phpMyAdmin4.8.5\\templates\\table\\search\\fields_table.twig");
    }
}
