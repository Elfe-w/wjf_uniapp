<?php

/* table/structure/row_stats_table.twig */
class __TwigTemplate_bf303a8b60802a55a8275ddbe8f9564f94d2315c17ecc0bdc89ac168136f5b68 extends Twig_Template
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
        echo "<table id=\"tablerowstats\" class=\"width100 data\">
<caption class=\"tblHeaders\">";
        // line 2
        echo _gettext("Row statistics");
        echo "</caption>
<tbody>";
        // line 4
        if ($this->getAttribute(($context["showtable"] ?? null), "Row_format", [], "array", true, true)) {
            // line 5
            echo "        <tr>
        <th class=\"name\">";
            // line 6
            echo _gettext("Format");
            echo "</th>";
            // line 7
            if (($this->getAttribute(($context["showtable"] ?? null), "Row_format", [], "array") == "Fixed")) {
                // line 8
                echo "            <td class=\"value\">";
                echo _gettext("static");
                echo "</td>";
            } elseif (($this->getAttribute(            // line 9
($context["showtable"] ?? null), "Row_format", [], "array") == "Dynamic")) {
                // line 10
                echo "            <td class=\"value\">";
                echo _gettext("dynamic");
                echo "</td>";
            } else {
                // line 12
                echo "            <td class=\"value\">";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["showtable"] ?? null), "Row_format", [], "array"), "html", null, true);
                echo "</td>";
            }
            // line 14
            echo "        </tr>";
        }
        // line 17
        if ( !twig_test_empty($this->getAttribute(($context["showtable"] ?? null), "Create_options", [], "array"))) {
            // line 18
            echo "        <tr>
        <th class=\"name\">";
            // line 19
            echo _gettext("Options");
            echo "</th>";
            // line 20
            if (($this->getAttribute(($context["showtable"] ?? null), "Create_options", [], "array") == "partitioned")) {
                // line 21
                echo "            <td class=\"value\">";
                echo _gettext("partitioned");
                echo "</td>";
            } else {
                // line 23
                echo "            <td class=\"value\">";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["showtable"] ?? null), "Create_options", [], "array"), "html", null, true);
                echo "</td>";
            }
            // line 25
            echo "        </tr>";
        }
        // line 28
        if ( !twig_test_empty(($context["tbl_collation"] ?? null))) {
            // line 29
            echo "        <tr>
        <th class=\"name\">";
            // line 30
            echo _gettext("Collation");
            echo "</th>
        <td class=\"value\">
            <dfn title=\"";
            // line 32
            echo twig_escape_filter($this->env, PhpMyAdmin\Charsets::getCollationDescr(($context["tbl_collation"] ?? null)), "html", null, true);
            echo "\">";
            // line 33
            echo twig_escape_filter($this->env, ($context["tbl_collation"] ?? null), "html", null, true);
            echo "
            </dfn>
        </td>
        </tr>";
        }
        // line 39
        if (( !($context["is_innodb"] ?? null) && $this->getAttribute(($context["showtable"] ?? null), "Rows", [], "array", true, true))) {
            // line 40
            echo "        <tr>
        <th class=\"name\">";
            // line 41
            echo _gettext("Rows");
            echo "</th>
        <td class=\"value\">";
            // line 42
            echo twig_escape_filter($this->env, PhpMyAdmin\Util::formatNumber($this->getAttribute(($context["showtable"] ?? null), "Rows", [], "array"), 0), "html", null, true);
            echo "</td>
        </tr>";
        }
        // line 46
        if ((( !($context["is_innodb"] ?? null) && $this->getAttribute(        // line 47
($context["showtable"] ?? null), "Avg_row_length", [], "array", true, true)) && ($this->getAttribute(        // line 48
($context["showtable"] ?? null), "Avg_row_length", [], "array") > 0))) {
            // line 49
            echo "        <tr>
        <th class=\"name\">";
            // line 50
            echo _gettext("Row length");
            echo "</th>";
            // line 51
            $context["avg_row_length"] = PhpMyAdmin\Util::formatByteDown($this->getAttribute(($context["showtable"] ?? null), "Avg_row_length", [], "array"), 6, 1);
            // line 52
            echo "        <td class=\"value\">";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["avg_row_length"] ?? null), 0, [], "array"), "html", null, true);
            echo twig_escape_filter($this->env, $this->getAttribute(($context["avg_row_length"] ?? null), 1, [], "array"), "html", null, true);
            echo "</td>
        </tr>";
        }
        // line 56
        if ((((( !($context["is_innodb"] ?? null) && $this->getAttribute(        // line 57
($context["showtable"] ?? null), "Data_length", [], "array", true, true)) && $this->getAttribute(        // line 58
($context["showtable"] ?? null), "Rows", [], "array", true, true)) && ($this->getAttribute(        // line 59
($context["showtable"] ?? null), "Rows", [], "array") > 0)) && (        // line 60
($context["mergetable"] ?? null) == false))) {
            // line 61
            echo "        <tr>
        <th class=\"name\">";
            // line 62
            echo _gettext("Row size");
            echo "</th>
        <td class=\"value\">";
            // line 63
            echo twig_escape_filter($this->env, ($context["avg_size"] ?? null), "html", null, true);
            echo twig_escape_filter($this->env, ($context["avg_unit"] ?? null), "html", null, true);
            echo "</td>
        </tr>";
        }
        // line 67
        if ($this->getAttribute(($context["showtable"] ?? null), "Auto_increment", [], "array", true, true)) {
            // line 68
            echo "        <tr>
        <th class=\"name\">";
            // line 69
            echo _gettext("Next autoindex");
            echo "</th>
        <td class=\"value\">";
            // line 70
            echo twig_escape_filter($this->env, PhpMyAdmin\Util::formatNumber($this->getAttribute(($context["showtable"] ?? null), "Auto_increment", [], "array"), 0), "html", null, true);
            echo "</td>
        </tr>";
        }
        // line 74
        if ($this->getAttribute(($context["showtable"] ?? null), "Create_time", [], "array", true, true)) {
            // line 75
            echo "        <tr>
        <th class=\"name\">";
            // line 76
            echo _gettext("Creation");
            echo "</th>
        <td class=\"value\">";
            // line 77
            echo twig_escape_filter($this->env, PhpMyAdmin\Util::localisedDate(twig_date_format_filter($this->env, $this->getAttribute(($context["showtable"] ?? null), "Create_time", [], "array"), "U")), "html", null, true);
            echo "</td>
        </tr>";
        }
        // line 81
        if ($this->getAttribute(($context["showtable"] ?? null), "Update_time", [], "array", true, true)) {
            // line 82
            echo "        <tr>
        <th class=\"name\">";
            // line 83
            echo _gettext("Last update");
            echo "</th>
        <td class=\"value\">";
            // line 84
            echo twig_escape_filter($this->env, PhpMyAdmin\Util::localisedDate(twig_date_format_filter($this->env, $this->getAttribute(($context["showtable"] ?? null), "Update_time", [], "array"), "U")), "html", null, true);
            echo "</td>
        </tr>";
        }
        // line 88
        if ($this->getAttribute(($context["showtable"] ?? null), "Check_time", [], "array", true, true)) {
            // line 89
            echo "        <tr>
        <th class=\"name\">";
            // line 90
            echo _gettext("Last check");
            echo "</th>
        <td class=\"value\">";
            // line 91
            echo twig_escape_filter($this->env, PhpMyAdmin\Util::localisedDate(twig_date_format_filter($this->env, $this->getAttribute(($context["showtable"] ?? null), "Check_time", [], "array"), "U")), "html", null, true);
            echo "</td>
        </tr>";
        }
        // line 94
        echo "</tbody>
</table>
";
    }

    public function getTemplateName()
    {
        return "table/structure/row_stats_table.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  206 => 94,  201 => 91,  197 => 90,  194 => 89,  192 => 88,  187 => 84,  183 => 83,  180 => 82,  178 => 81,  173 => 77,  169 => 76,  166 => 75,  164 => 74,  159 => 70,  155 => 69,  152 => 68,  150 => 67,  144 => 63,  140 => 62,  137 => 61,  135 => 60,  134 => 59,  133 => 58,  132 => 57,  131 => 56,  124 => 52,  122 => 51,  119 => 50,  116 => 49,  114 => 48,  113 => 47,  112 => 46,  107 => 42,  103 => 41,  100 => 40,  98 => 39,  91 => 33,  88 => 32,  83 => 30,  80 => 29,  78 => 28,  75 => 25,  70 => 23,  65 => 21,  63 => 20,  60 => 19,  57 => 18,  55 => 17,  52 => 14,  47 => 12,  42 => 10,  40 => 9,  36 => 8,  34 => 7,  31 => 6,  28 => 5,  26 => 4,  22 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "table/structure/row_stats_table.twig", "D:\\phpstudy_pro\\WWW\\back\\public\\phpMyAdmin4.8.5\\templates\\table\\structure\\row_stats_table.twig");
    }
}
