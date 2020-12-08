<?php

/* table/structure/display_table_stats.twig */
class __TwigTemplate_444e3158c9d4b110b846d9206db6122d975cb9852094968b1daedd7b92424fea extends Twig_Template
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
        echo "<div id=\"tablestatistics\">
    <fieldset>
        <legend>";
        // line 3
        echo _gettext("Information");
        echo "</legend>";
        // line 4
        if ($this->getAttribute(($context["showtable"] ?? null), "TABLE_COMMENT", [], "array")) {
            // line 5
            echo "            <p>
                <strong>";
            // line 6
            echo _gettext("Table comments:");
            echo "</strong>";
            // line 7
            echo twig_escape_filter($this->env, $this->getAttribute(($context["showtable"] ?? null), "TABLE_COMMENT", [], "array"), "html", null, true);
            echo "
            </p>";
        }
        // line 10
        echo "        <a id=\"showusage\"></a>";
        // line 12
        if (( !($context["tbl_is_view"] ?? null) &&  !($context["db_is_system_schema"] ?? null))) {
            // line 13
            echo "            <table id=\"tablespaceusage\" class=\"width100 data\">
                <caption class=\"tblHeaders\">";
            // line 14
            echo _gettext("Space usage");
            echo "</caption>
                <tbody>
                    <tr>
                        <th class=\"name\">";
            // line 17
            echo _gettext("Data");
            echo "</th>
                        <td class=\"value\">";
            // line 18
            echo twig_escape_filter($this->env, ($context["data_size"] ?? null), "html", null, true);
            echo "</td>
                        <td class=\"unit\">";
            // line 19
            echo twig_escape_filter($this->env, ($context["data_unit"] ?? null), "html", null, true);
            echo "</td>
                    </tr>";
            // line 22
            if ((isset($context["index_size"]) || array_key_exists("index_size", $context))) {
                // line 23
                echo "                    <tr>
                        <th class=\"name\">";
                // line 24
                echo _gettext("Index");
                echo "</th>
                        <td class=\"value\">";
                // line 25
                echo twig_escape_filter($this->env, ($context["index_size"] ?? null), "html", null, true);
                echo "</td>
                        <td class=\"unit\">";
                // line 26
                echo twig_escape_filter($this->env, ($context["index_unit"] ?? null), "html", null, true);
                echo "</td>
                    </tr>";
            }
            // line 30
            if ((isset($context["free_size"]) || array_key_exists("free_size", $context))) {
                // line 31
                echo "                    <tr>
                        <th class=\"name\">";
                // line 32
                echo _gettext("Overhead");
                echo "</th>
                        <td class=\"value\">";
                // line 33
                echo twig_escape_filter($this->env, ($context["free_size"] ?? null), "html", null, true);
                echo "</td>
                        <td class=\"unit\">";
                // line 34
                echo twig_escape_filter($this->env, ($context["free_unit"] ?? null), "html", null, true);
                echo "</td>
                    </tr>
                    <tr>
                        <th class=\"name\">";
                // line 37
                echo _gettext("Effective");
                echo "</th>
                        <td class=\"value\">";
                // line 38
                echo twig_escape_filter($this->env, ($context["effect_size"] ?? null), "html", null, true);
                echo "</td>
                        <td class=\"unit\">";
                // line 39
                echo twig_escape_filter($this->env, ($context["effect_unit"] ?? null), "html", null, true);
                echo "</td>
                    </tr>";
            }
            // line 43
            if (((isset($context["tot_size"]) || array_key_exists("tot_size", $context)) && (($context["mergetable"] ?? null) == false))) {
                // line 44
                echo "                    <tr>
                        <th class=\"name\">";
                // line 45
                echo _gettext("Total");
                echo "</th>
                        <td class=\"value\">";
                // line 46
                echo twig_escape_filter($this->env, ($context["tot_size"] ?? null), "html", null, true);
                echo "</td>
                        <td class=\"unit\">";
                // line 47
                echo twig_escape_filter($this->env, ($context["tot_unit"] ?? null), "html", null, true);
                echo "</td>
                    </tr>";
            }
            // line 52
            if (((isset($context["free_size"]) || array_key_exists("free_size", $context)) && ((((            // line 53
($context["tbl_storage_engine"] ?? null) == "MYISAM") || (            // line 54
($context["tbl_storage_engine"] ?? null) == "ARIA")) || (            // line 55
($context["tbl_storage_engine"] ?? null) == "MARIA")) || (            // line 56
($context["tbl_storage_engine"] ?? null) == "BDB")))) {
                // line 57
                echo "                    <tr class=\"tblFooters print_ignore\">
                        <td colspan=\"3\" class=\"center\">
                            <a href=\"sql.php\" data-post=\"";
                // line 59
                echo twig_escape_filter($this->env, ($context["url_query"] ?? null), "html", null, true);
                echo "&amp;pos=0&amp;sql_query=";
                // line 60
                echo twig_escape_filter($this->env, twig_urlencode_filter(("OPTIMIZE TABLE " . PhpMyAdmin\Util::backquote(($context["table"] ?? null)))), "html", null, true);
                echo "\">";
                // line 61
                echo PhpMyAdmin\Util::getIcon("b_tbloptimize", _gettext("Optimize table"));
                echo "
                            </a>
                        </td>
                    </tr>";
            }
            // line 66
            echo "                </tbody>
            </table>";
        }
        // line 70
        $this->loadTemplate("table/structure/row_stats_table.twig", "table/structure/display_table_stats.twig", 70)->display(["showtable" =>         // line 71
($context["showtable"] ?? null), "tbl_collation" =>         // line 72
($context["tbl_collation"] ?? null), "is_innodb" =>         // line 73
($context["is_innodb"] ?? null), "mergetable" =>         // line 74
($context["mergetable"] ?? null), "avg_size" => ((        // line 75
(isset($context["avg_size"]) || array_key_exists("avg_size", $context))) ? (($context["avg_size"] ?? null)) : (null)), "avg_unit" => ((        // line 76
(isset($context["avg_unit"]) || array_key_exists("avg_unit", $context))) ? (($context["avg_unit"] ?? null)) : (null))]);
        // line 78
        echo "    </fieldset>
</div>
";
    }

    public function getTemplateName()
    {
        return "table/structure/display_table_stats.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  167 => 78,  165 => 76,  164 => 75,  163 => 74,  162 => 73,  161 => 72,  160 => 71,  159 => 70,  155 => 66,  148 => 61,  145 => 60,  142 => 59,  138 => 57,  136 => 56,  135 => 55,  134 => 54,  133 => 53,  132 => 52,  127 => 47,  123 => 46,  119 => 45,  116 => 44,  114 => 43,  109 => 39,  105 => 38,  101 => 37,  95 => 34,  91 => 33,  87 => 32,  84 => 31,  82 => 30,  77 => 26,  73 => 25,  69 => 24,  66 => 23,  64 => 22,  60 => 19,  56 => 18,  52 => 17,  46 => 14,  43 => 13,  41 => 12,  39 => 10,  34 => 7,  31 => 6,  28 => 5,  26 => 4,  23 => 3,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "table/structure/display_table_stats.twig", "D:\\phpstudy_pro\\WWW\\back\\public\\phpMyAdmin4.8.5\\templates\\table\\structure\\display_table_stats.twig");
    }
}
