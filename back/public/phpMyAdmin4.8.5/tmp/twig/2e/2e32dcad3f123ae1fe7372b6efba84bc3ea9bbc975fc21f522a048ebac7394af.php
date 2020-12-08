<?php

/* table/structure/actions_in_table_structure.twig */
class __TwigTemplate_e81e2a11ec8d6cbd6a79940c42d6fbfad9459e61d739c63bad246e7a063c492a extends Twig_Template
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
        echo "<td class=\"print_ignore\"><ul class=\"table-structure-actions resizable-menu\">";
        // line 2
        if (($context["hide_structure_actions"] ?? null)) {
            // line 3
            echo "        <li class=\"submenu shown\">
            <a href=\"#\" class=\"tab nowrap\">";
            // line 4
            echo PhpMyAdmin\Util::getIcon("b_more", _gettext("More"));
            echo "</a>
            <ul>";
        }
        // line 8
        $this->loadTemplate("table/structure/action_row_in_structure_table.twig", "table/structure/actions_in_table_structure.twig", 8)->display(["type" =>         // line 9
($context["type"] ?? null), "tbl_storage_engine" =>         // line 10
($context["tbl_storage_engine"] ?? null), "class" => "primary nowrap", "has_field" => (        // line 12
($context["primary"] ?? null) && $this->getAttribute(($context["primary"] ?? null), "hasColumn", [0 => ($context["field_name"] ?? null)], "method")), "has_link_class" => true, "url_query" =>         // line 14
($context["url_query"] ?? null), "primary" =>         // line 15
($context["primary"] ?? null), "syntax" => "ADD PRIMARY KEY", "message" => _gettext("A primary key has been added on %s."), "action" => "Primary", "titles" =>         // line 19
($context["titles"] ?? null), "row" =>         // line 20
($context["row"] ?? null), "is_primary" => true, "table" =>         // line 22
($context["table"] ?? null)]);
        // line 26
        $this->loadTemplate("table/structure/action_row_in_structure_table.twig", "table/structure/actions_in_table_structure.twig", 26)->display(["type" =>         // line 27
($context["type"] ?? null), "tbl_storage_engine" =>         // line 28
($context["tbl_storage_engine"] ?? null), "class" => "add_unique unique nowrap", "has_field" => twig_in_filter(        // line 30
($context["field_name"] ?? null), ($context["columns_with_unique_index"] ?? null)), "has_link_class" => false, "url_query" =>         // line 32
($context["url_query"] ?? null), "primary" =>         // line 33
($context["primary"] ?? null), "syntax" => "ADD UNIQUE", "message" => _gettext("An index has been added on %s."), "action" => "Unique", "titles" =>         // line 37
($context["titles"] ?? null), "row" =>         // line 38
($context["row"] ?? null), "is_primary" => false, "table" =>         // line 40
($context["table"] ?? null)]);
        // line 44
        $this->loadTemplate("table/structure/action_row_in_structure_table.twig", "table/structure/actions_in_table_structure.twig", 44)->display(["type" =>         // line 45
($context["type"] ?? null), "tbl_storage_engine" =>         // line 46
($context["tbl_storage_engine"] ?? null), "class" => "add_index nowrap", "has_field" => false, "has_link_class" => false, "url_query" =>         // line 50
($context["url_query"] ?? null), "primary" =>         // line 51
($context["primary"] ?? null), "syntax" => "ADD INDEX", "message" => _gettext("An index has been added on %s."), "action" => "Index", "titles" =>         // line 55
($context["titles"] ?? null), "row" =>         // line 56
($context["row"] ?? null), "is_primary" => false, "table" =>         // line 58
($context["table"] ?? null)]);
        // line 62
        $context["spatial_types"] = [0 => "geometry", 1 => "point", 2 => "linestring", 3 => "polygon", 4 => "multipoint", 5 => "multilinestring", 6 => "multipolygon", 7 => "geomtrycollection"];
        // line 72
        $this->loadTemplate("table/structure/action_row_in_structure_table.twig", "table/structure/actions_in_table_structure.twig", 72)->display(["type" =>         // line 73
($context["type"] ?? null), "tbl_storage_engine" =>         // line 74
($context["tbl_storage_engine"] ?? null), "class" => "spatial nowrap", "has_field" => (!twig_in_filter(        // line 76
($context["type"] ?? null), ($context["spatial_types"] ?? null)) && ((        // line 77
($context["tbl_storage_engine"] ?? null) == "MYISAM") || (($context["mysql_int_version"] ?? null) >= 50705))), "has_link_class" => false, "url_query" =>         // line 79
($context["url_query"] ?? null), "primary" =>         // line 80
($context["primary"] ?? null), "syntax" => "ADD SPATIAL", "message" => _gettext("An index has been added on %s."), "action" => "Spatial", "titles" =>         // line 84
($context["titles"] ?? null), "row" =>         // line 85
($context["row"] ?? null), "is_primary" => false, "table" =>         // line 87
($context["table"] ?? null)]);
        // line 91
        echo "    <li class=\"fulltext nowrap\">";
        // line 92
        if ((( !twig_test_empty(($context["tbl_storage_engine"] ?? null)) && ((((        // line 93
($context["tbl_storage_engine"] ?? null) == "MYISAM") || (        // line 94
($context["tbl_storage_engine"] ?? null) == "ARIA")) || (        // line 95
($context["tbl_storage_engine"] ?? null) == "MARIA")) || ((        // line 96
($context["tbl_storage_engine"] ?? null) == "INNODB") && (($context["mysql_int_version"] ?? null) >= 50604)))) && (twig_in_filter("text",         // line 97
($context["type"] ?? null)) || twig_in_filter("char", ($context["type"] ?? null))))) {
            // line 98
            echo "        <a rel=\"samepage\" class=\"ajax add_key add_fulltext_anchor\" href=\"tbl_structure.php\"
            data-post=\"";
            // line 99
            echo ($context["url_query"] ?? null);
            echo "&amp;add_key=1&amp;sql_query=";
            // line 100
            echo twig_escape_filter($this->env, twig_urlencode_filter((((("ALTER TABLE " . PhpMyAdmin\Util::backquote(($context["table"] ?? null))) . " ADD FULLTEXT(") . PhpMyAdmin\Util::backquote($this->getAttribute(            // line 101
($context["row"] ?? null), "Field", [], "array"))) . ");")), "html", null, true);
            // line 102
            echo "&amp;message_to_show=";
            // line 103
            echo twig_escape_filter($this->env, twig_urlencode_filter(sprintf(_gettext("An index has been added on %s."), twig_escape_filter($this->env, $this->getAttribute(($context["row"] ?? null), "Field", [], "array")))), "html", null, true);
            echo "\">";
            // line 104
            echo $this->getAttribute(($context["titles"] ?? null), "IdxFulltext", [], "array");
            echo "
        </a>";
        } else {
            // line 107
            echo $this->getAttribute(($context["titles"] ?? null), "NoIdxFulltext", [], "array");
        }
        // line 109
        echo "    </li>";
        // line 112
        echo "    <li class=\"browse nowrap\">
        <a href=\"sql.php\" data-post=\"";
        // line 113
        echo ($context["url_query"] ?? null);
        echo "&amp;sql_query=";
        // line 114
        echo twig_escape_filter($this->env, twig_urlencode_filter(((((((((("SELECT COUNT(*) AS " . PhpMyAdmin\Util::backquote(_gettext("Rows"))) . ", ") . PhpMyAdmin\Util::backquote($this->getAttribute(        // line 115
($context["row"] ?? null), "Field", [], "array"))) . " FROM ") . PhpMyAdmin\Util::backquote(        // line 116
($context["table"] ?? null))) . " GROUP BY ") . PhpMyAdmin\Util::backquote($this->getAttribute(        // line 117
($context["row"] ?? null), "Field", [], "array"))) . " ORDER BY ") . PhpMyAdmin\Util::backquote($this->getAttribute(        // line 118
($context["row"] ?? null), "Field", [], "array")))), "html", null, true);
        // line 119
        echo "&amp;is_browse_distinct=1\">";
        // line 120
        echo $this->getAttribute(($context["titles"] ?? null), "DistinctValues", [], "array");
        echo "
        </a>
    </li>";
        // line 123
        if (($context["central_columns_work"] ?? null)) {
            // line 124
            echo "        <li class=\"browse nowrap\">";
            // line 125
            if (($context["is_in_central_columns"] ?? null)) {
                // line 126
                echo "            <a href=\"#\" class=\"central_columns remove_button\">";
                // line 127
                echo PhpMyAdmin\Util::getIcon("centralColumns_delete", _gettext("Remove from central columns"));
                echo "
            </a>";
            } else {
                // line 130
                echo "            <a href=\"#\" class=\"central_columns add_button\">";
                // line 131
                echo PhpMyAdmin\Util::getIcon("centralColumns_add", _gettext("Add to central columns"));
                echo "
            </a>";
            }
            // line 134
            echo "        </li>";
        }
        // line 136
        if (($context["hide_structure_actions"] ?? null)) {
            // line 137
            echo "            </ul>
        </li>";
        }
        // line 140
        echo "</ul></td>
";
    }

    public function getTemplateName()
    {
        return "table/structure/actions_in_table_structure.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  154 => 140,  150 => 137,  148 => 136,  145 => 134,  140 => 131,  138 => 130,  133 => 127,  131 => 126,  129 => 125,  127 => 124,  125 => 123,  120 => 120,  118 => 119,  116 => 118,  115 => 117,  114 => 116,  113 => 115,  112 => 114,  109 => 113,  106 => 112,  104 => 109,  101 => 107,  96 => 104,  93 => 103,  91 => 102,  89 => 101,  88 => 100,  85 => 99,  82 => 98,  80 => 97,  79 => 96,  78 => 95,  77 => 94,  76 => 93,  75 => 92,  73 => 91,  71 => 87,  70 => 85,  69 => 84,  68 => 80,  67 => 79,  66 => 77,  65 => 76,  64 => 74,  63 => 73,  62 => 72,  60 => 62,  58 => 58,  57 => 56,  56 => 55,  55 => 51,  54 => 50,  53 => 46,  52 => 45,  51 => 44,  49 => 40,  48 => 38,  47 => 37,  46 => 33,  45 => 32,  44 => 30,  43 => 28,  42 => 27,  41 => 26,  39 => 22,  38 => 20,  37 => 19,  36 => 15,  35 => 14,  34 => 12,  33 => 10,  32 => 9,  31 => 8,  26 => 4,  23 => 3,  21 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "table/structure/actions_in_table_structure.twig", "D:\\phpstudy_pro\\WWW\\back\\public\\phpMyAdmin4.8.5\\templates\\table\\structure\\actions_in_table_structure.twig");
    }
}
