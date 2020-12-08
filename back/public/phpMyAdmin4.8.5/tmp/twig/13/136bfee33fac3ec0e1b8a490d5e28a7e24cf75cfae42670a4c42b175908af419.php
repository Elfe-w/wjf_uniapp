<?php

/* columns_definitions/table_fields_definitions.twig */
class __TwigTemplate_3a15b447949384c4226c51e7b9aed08ba21edc368b67db34eb958996e0ce432c extends Twig_Template
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
        echo "<div class=\"responsivetable\">
<table id=\"table_columns\" class=\"noclick\">
    <caption class=\"tblHeaders\">";
        // line 4
        echo _gettext("Structure");
        // line 5
        echo PhpMyAdmin\Util::showMySQLDocu("CREATE_TABLE");
        echo "
    </caption>
    <tr>
        <th>";
        // line 9
        echo _gettext("Name");
        // line 10
        echo "        </th>
        <th>";
        // line 12
        echo _gettext("Type");
        // line 13
        echo PhpMyAdmin\Util::showMySQLDocu("data-types");
        echo "
        </th>
        <th>";
        // line 16
        echo _gettext("Length/Values");
        // line 17
        echo PhpMyAdmin\Util::showHint(_gettext("If column type is \"enum\" or \"set\", please enter the values using this format: 'a','b','c'…<br />If you ever need to put a backslash (\"\") or a single quote (\"'\") amongst those values, precede it with a backslash (for example '\\\\xyz' or 'a\\'b')."));
        echo "
        </th>
        <th>";
        // line 20
        echo _gettext("Default");
        // line 21
        echo PhpMyAdmin\Util::showHint(_gettext("For default values, please enter just a single value, without backslash escaping or quotes, using this format: a"));
        echo "
        </th>
        <th>";
        // line 24
        echo _gettext("Collation");
        // line 25
        echo "        </th>
        <th>";
        // line 27
        echo _gettext("Attributes");
        // line 28
        echo "        </th>
        <th>";
        // line 30
        echo _gettext("Null");
        // line 31
        echo "        </th>";
        // line 34
        if (((isset($context["change_column"]) || array_key_exists("change_column", $context)) &&  !twig_test_empty(($context["change_column"] ?? null)))) {
            // line 35
            echo "            <th>";
            // line 36
            echo _gettext("Adjust privileges");
            // line 37
            echo PhpMyAdmin\Util::showDocu("faq", "faq6-39");
            echo "
            </th>";
        }
        // line 44
        if ( !($context["is_backup"] ?? null)) {
            // line 45
            echo "            <th>";
            // line 46
            echo _gettext("Index");
            // line 47
            echo "            </th>";
        }
        // line 49
        echo "
        <th>
            <abbr title=\"AUTO_INCREMENT\">A_I</abbr>
        </th>
        <th>";
        // line 54
        echo _gettext("Comments");
        // line 55
        echo "        </th>";
        // line 57
        if (($context["is_virtual_columns_supported"] ?? null)) {
            // line 58
            echo "            <th>";
            // line 59
            echo _gettext("Virtuality");
            // line 60
            echo "            </th>";
        }
        // line 63
        if ((isset($context["fields_meta"]) || array_key_exists("fields_meta", $context))) {
            // line 64
            echo "            <th>";
            // line 65
            echo _gettext("Move column");
            // line 66
            echo "            </th>";
        }
        // line 69
        if ((($context["mimework"] ?? null) && ($context["browse_mime"] ?? null))) {
            // line 70
            echo "            <th>";
            // line 71
            echo _gettext("MIME type");
            // line 72
            echo "            </th>
            <th>
                <a href=\"transformation_overview.php";
            // line 75
            echo PhpMyAdmin\Url::getCommon();
            echo "#transformation\" title=\"";
            // line 76
            echo _gettext("List of available transformations and their options");
            // line 77
            echo "\" target=\"_blank\">";
            // line 78
            echo _gettext("Browser display transformation");
            // line 79
            echo "                </a>
            </th>
            <th>";
            // line 82
            echo _gettext("Browser display transformation options");
            // line 83
            echo PhpMyAdmin\Util::showHint(_gettext("Please enter the values for transformation options using this format: 'a', 100, b,'c'…<br />If you ever need to put a backslash (\"\\\") or a single quote (\"'\") amongst those values, precede it with a backslash (for example '\\\\xyz' or 'a\\'b')."));
            echo "
            </th>
            <th>
                <a href=\"transformation_overview.php";
            // line 86
            echo PhpMyAdmin\Url::getCommon();
            echo "#input_transformation\"
                   title=\"";
            // line 87
            echo _gettext("List of available transformations and their options");
            echo "\"
                   target=\"_blank\">";
            // line 89
            echo _gettext("Input transformation");
            // line 90
            echo "                </a>
            </th>
            <th>";
            // line 93
            echo _gettext("Input transformation options");
            // line 94
            echo PhpMyAdmin\Util::showHint(_gettext("Please enter the values for transformation options using this format: 'a', 100, b,'c'…<br />If you ever need to put a backslash (\"\\\") or a single quote (\"'\") amongst those values, precede it with a backslash (for example '\\\\xyz' or 'a\\'b')."));
            echo "
            </th>";
        }
        // line 97
        echo "    </tr>";
        // line 98
        $context["options"] = ["" => "", "VIRTUAL" => "VIRTUAL"];
        // line 99
        if ((($context["server_type"] ?? null) == "MariaDB")) {
            // line 100
            $context["options"] = twig_array_merge(($context["options"] ?? null), ["PERSISTENT" => "PERSISTENT"]);
        } else {
            // line 102
            $context["options"] = twig_array_merge(($context["options"] ?? null), ["STORED" => "STORED"]);
        }
        // line 104
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["content_cells"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["content_row"]) {
            // line 105
            echo "        <tr>";
            // line 106
            $this->loadTemplate("columns_definitions/column_attributes.twig", "columns_definitions/table_fields_definitions.twig", 106)->display(twig_array_merge($context["content_row"], ["options" =>             // line 107
($context["options"] ?? null), "change_column" =>             // line 108
($context["change_column"] ?? null), "is_virtual_columns_supported" =>             // line 109
($context["is_virtual_columns_supported"] ?? null), "browse_mime" =>             // line 110
($context["browse_mime"] ?? null), "max_rows" =>             // line 111
($context["max_rows"] ?? null), "char_editing" =>             // line 112
($context["char_editing"] ?? null), "attribute_types" =>             // line 113
($context["attribute_types"] ?? null), "privs_available" =>             // line 114
($context["privs_available"] ?? null), "max_length" =>             // line 115
($context["max_length"] ?? null), "dbi" =>             // line 116
($context["dbi"] ?? null), "disable_is" =>             // line 117
($context["disable_is"] ?? null)]));
            // line 119
            echo "        </tr>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['content_row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 121
        echo "</table>
</div>
";
    }

    public function getTemplateName()
    {
        return "columns_definitions/table_fields_definitions.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  208 => 121,  202 => 119,  200 => 117,  199 => 116,  198 => 115,  197 => 114,  196 => 113,  195 => 112,  194 => 111,  193 => 110,  192 => 109,  191 => 108,  190 => 107,  189 => 106,  187 => 105,  183 => 104,  180 => 102,  177 => 100,  175 => 99,  173 => 98,  171 => 97,  166 => 94,  164 => 93,  160 => 90,  158 => 89,  154 => 87,  150 => 86,  144 => 83,  142 => 82,  138 => 79,  136 => 78,  134 => 77,  132 => 76,  129 => 75,  125 => 72,  123 => 71,  121 => 70,  119 => 69,  116 => 66,  114 => 65,  112 => 64,  110 => 63,  107 => 60,  105 => 59,  103 => 58,  101 => 57,  99 => 55,  97 => 54,  91 => 49,  88 => 47,  86 => 46,  84 => 45,  82 => 44,  77 => 37,  75 => 36,  73 => 35,  71 => 34,  69 => 31,  67 => 30,  64 => 28,  62 => 27,  59 => 25,  57 => 24,  52 => 21,  50 => 20,  45 => 17,  43 => 16,  38 => 13,  36 => 12,  33 => 10,  31 => 9,  25 => 5,  23 => 4,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "columns_definitions/table_fields_definitions.twig", "D:\\phpstudy_pro\\WWW\\back\\public\\phpMyAdmin4.8.5\\templates\\columns_definitions\\table_fields_definitions.twig");
    }
}
