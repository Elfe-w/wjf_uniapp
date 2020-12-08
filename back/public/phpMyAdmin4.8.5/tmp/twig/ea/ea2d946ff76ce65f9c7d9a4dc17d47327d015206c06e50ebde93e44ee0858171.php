<?php

/* table/structure/table_structure_header.twig */
class __TwigTemplate_6a56cf79213fcb935e16c72074e8ff9ef89505d06f3a6e051bbb47a88d67744e extends Twig_Template
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
        echo "<thead>
    <tr>
        <th class=\"print_ignore\"></th>
        <th>#</th>
        <th>";
        // line 5
        echo _gettext("Name");
        echo "</th>
        <th>";
        // line 6
        echo _gettext("Type");
        echo "</th>
        <th>";
        // line 7
        echo _gettext("Collation");
        echo "</th>
        <th>";
        // line 8
        echo _gettext("Attributes");
        echo "</th>
        <th>";
        // line 9
        echo _gettext("Null");
        echo "</th>
        <th>";
        // line 10
        echo _gettext("Default");
        echo "</th>";
        // line 11
        if (($context["show_column_comments"] ?? null)) {
            // line 12
            echo "<th>";
            echo _gettext("Comments");
            echo "</th>";
        }
        // line 14
        echo "        <th>";
        echo _gettext("Extra");
        echo "</th>";
        // line 16
        if (( !($context["db_is_system_schema"] ?? null) &&  !($context["tbl_is_view"] ?? null))) {
            // line 17
            echo "            <th colspan=\"";
            echo ((PhpMyAdmin\Util::showIcons("ActionLinksMode")) ? ("8") : ("9"));
            // line 18
            echo "\" class=\"action print_ignore\">";
            echo _gettext("Action");
            echo "</th>";
        }
        // line 20
        echo "    </tr>
</thead>
";
    }

    public function getTemplateName()
    {
        return "table/structure/table_structure_header.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  69 => 20,  64 => 18,  61 => 17,  59 => 16,  55 => 14,  50 => 12,  48 => 11,  45 => 10,  41 => 9,  37 => 8,  33 => 7,  29 => 6,  25 => 5,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "table/structure/table_structure_header.twig", "D:\\phpstudy_pro\\WWW\\back\\public\\phpMyAdmin4.8.5\\templates\\table\\structure\\table_structure_header.twig");
    }
}
