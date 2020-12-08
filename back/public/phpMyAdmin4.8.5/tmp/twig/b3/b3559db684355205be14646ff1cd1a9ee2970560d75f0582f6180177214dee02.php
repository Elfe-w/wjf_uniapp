<?php

/* table/structure/display_structure.twig */
class __TwigTemplate_477ce638c7984ac3752877e31b76c6164e48350ae9a0038906862e5edbfa4caa extends Twig_Template
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
        echo "<form method=\"post\" action=\"tbl_structure.php\" name=\"fieldsForm\" id=\"fieldsForm\"
    class=\"ajax";
        // line 2
        echo ((($context["hide_structure_actions"] ?? null)) ? (" HideStructureActions") : (""));
        echo "\">";
        // line 3
        echo PhpMyAdmin\Url::getHiddenInputs(($context["db"] ?? null), ($context["table"] ?? null));
        echo "
    <input type=\"hidden\" name=\"table_type\" value=";
        // line 5
        if (($context["db_is_system_schema"] ?? null)) {
            // line 6
            echo "\"information_schema\"";
        } elseif (        // line 7
($context["tbl_is_view"] ?? null)) {
            // line 8
            echo "\"view\"";
        } else {
            // line 10
            echo "\"table\"";
        }
        // line 11
        echo " />
    <div class=\"responsivetable\">
    <table id=\"tablestructure\" class=\"data topmargin\">";
        // line 15
        $this->loadTemplate("table/structure/table_structure_header.twig", "table/structure/display_structure.twig", 15)->display(["db_is_system_schema" =>         // line 16
($context["db_is_system_schema"] ?? null), "tbl_is_view" =>         // line 17
($context["tbl_is_view"] ?? null), "show_column_comments" =>         // line 18
($context["show_column_comments"] ?? null)]);
        // line 20
        echo "        <tbody>";
        // line 22
        $context["rownum"] = 0;
        // line 23
        $context["columns_list"] = [];
        // line 24
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["fields"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 25
            $context["rownum"] = (($context["rownum"] ?? null) + 1);
            // line 26
            $context["columns_list"] = twig_array_merge(($context["columns_list"] ?? null), [0 => $this->getAttribute($context["row"], "Field", [], "array")]);
            // line 27
            $context["field_charset"] = $this->getAttribute($context["row"], "Collation", [], "array");
            // line 29
            $context["extracted_columnspec"] = PhpMyAdmin\Util::extractColumnSpec($this->getAttribute($context["row"], "Type", [], "array"));
            // line 30
            $context["attribute"] = $this->getAttribute(($context["extracted_columnspec"] ?? null), "attribute", [], "array");
            // line 31
            if ( !(strpos($this->getAttribute($context["row"], "Extra", [], "array"), "on update CURRENT_TIMESTAMP") === false)) {
                // line 33
                $context["attribute"] = "on update CURRENT_TIMESTAMP";
            }
            // line 36
            if ((null === $this->getAttribute($context["row"], "Default", [], "array"))) {
                // line 37
                if (($this->getAttribute($context["row"], "Null", [], "array") == "YES")) {
                    // line 38
                    $context["row"] = twig_array_merge($context["row"], ["Default" => "<em>NULL</em>"]);
                }
            } else {
                // line 41
                $context["row"] = twig_array_merge($context["row"], ["Default" => twig_escape_filter($this->env, $this->getAttribute($context["row"], "Default", [], "array"))]);
            }
            // line 44
            $context["field_name"] = twig_escape_filter($this->env, $this->getAttribute($context["row"], "Field", [], "array"));
            // line 45
            $context["displayed_field_name"] = ($context["field_name"] ?? null);
            // line 47
            $context["comments"] = "";
            // line 50
            if ($this->getAttribute(($context["comments_map"] ?? null), $this->getAttribute($context["row"], "Field", [], "array"), [], "array", true, true)) {
                // line 51
                ob_start();
                // line 52
                echo "<span class=\"commented_column\" title=\"";
                // line 53
                echo twig_escape_filter($this->env, $this->getAttribute(($context["comments_map"] ?? null), $this->getAttribute($context["row"], "Field", [], "array"), [], "array"), "html", null, true);
                echo "\">";
                // line 54
                echo ($context["field_name"] ?? null);
                // line 55
                echo "</span>";
                $context["displayed_field_name"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                // line 57
                $context["comments"] = $this->getAttribute(($context["comments_map"] ?? null), $this->getAttribute($context["row"], "Field", [], "array"), [], "array");
            }
            // line 60
            if ((($context["primary"] ?? null) && $this->getAttribute(($context["primary"] ?? null), "hasColumn", [0 => ($context["field_name"] ?? null)], "method"))) {
                // line 61
                $context["displayed_field_name"] = (($context["displayed_field_name"] ?? null) . PhpMyAdmin\Util::getImage("b_primary", _gettext("Primary")));
            }
            // line 65
            if (twig_in_filter(($context["field_name"] ?? null), ($context["columns_with_index"] ?? null))) {
                // line 66
                $context["displayed_field_name"] = (($context["displayed_field_name"] ?? null) . PhpMyAdmin\Util::getImage("bd_primary", _gettext("Index")));
            }
            // line 70
            echo "        <tr>";
            // line 71
            $this->loadTemplate("table/structure/table_structure_row.twig", "table/structure/display_structure.twig", 71)->display(["row" =>             // line 72
$context["row"], "rownum" =>             // line 73
($context["rownum"] ?? null), "displayed_field_name" => preg_replace("/[\\x00-\\x1F]/", "&#x2051;",             // line 77
($context["displayed_field_name"] ?? null)), "type_nowrap" => PhpMyAdmin\Util::getClassForType($this->getAttribute(            // line 79
($context["extracted_columnspec"] ?? null), "type", [], "array")), "extracted_columnspec" =>             // line 80
($context["extracted_columnspec"] ?? null), "attribute" =>             // line 81
($context["attribute"] ?? null), "tbl_is_view" =>             // line 82
($context["tbl_is_view"] ?? null), "db_is_system_schema" =>             // line 83
($context["db_is_system_schema"] ?? null), "url_query" =>             // line 84
($context["url_query"] ?? null), "titles" =>             // line 85
($context["titles"] ?? null), "table" =>             // line 86
($context["table"] ?? null), "tbl_storage_engine" =>             // line 87
($context["tbl_storage_engine"] ?? null), "field_charset" =>             // line 88
($context["field_charset"] ?? null), "comments" =>             // line 89
($context["comments"] ?? null), "show_column_comments" =>             // line 90
($context["show_column_comments"] ?? null), "relation_commwork" =>             // line 91
($context["relation_commwork"] ?? null), "relation_mimework" =>             // line 92
($context["relation_mimework"] ?? null), "browse_mime" =>             // line 93
($context["browse_mime"] ?? null)]);
            // line 95
            if (( !($context["tbl_is_view"] ?? null) &&  !($context["db_is_system_schema"] ?? null))) {
                // line 96
                $this->loadTemplate("table/structure/actions_in_table_structure.twig", "table/structure/display_structure.twig", 96)->display(["row" =>                 // line 97
$context["row"], "rownum" =>                 // line 98
($context["rownum"] ?? null), "extracted_columnspec" =>                 // line 99
($context["extracted_columnspec"] ?? null), "type" => (( !twig_test_empty($this->getAttribute(                // line 100
($context["extracted_columnspec"] ?? null), "print_type", [], "array"))) ? ($this->getAttribute(($context["extracted_columnspec"] ?? null), "print_type", [], "array")) : ("")), "tbl_storage_engine" =>                 // line 101
($context["tbl_storage_engine"] ?? null), "primary" =>                 // line 102
($context["primary"] ?? null), "field_name" =>                 // line 103
($context["field_name"] ?? null), "url_query" =>                 // line 104
($context["url_query"] ?? null), "titles" =>                 // line 105
($context["titles"] ?? null), "columns_with_unique_index" =>                 // line 106
($context["columns_with_unique_index"] ?? null), "is_in_central_columns" => ((twig_in_filter($this->getAttribute(                // line 107
$context["row"], "Field", [], "array"), ($context["central_list"] ?? null))) ? (true) : (false)), "central_columns_work" =>                 // line 108
($context["central_columns_work"] ?? null), "table" =>                 // line 109
($context["table"] ?? null), "hide_structure_actions" =>                 // line 110
($context["hide_structure_actions"] ?? null), "mysql_int_version" =>                 // line 111
($context["mysql_int_version"] ?? null)]);
            }
            // line 114
            echo "        </tr>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 116
        echo "        </tbody>
    </table>
    </div>";
        // line 119
        $this->loadTemplate("table/structure/check_all_table_column.twig", "table/structure/display_structure.twig", 119)->display(["pma_theme_image" =>         // line 120
($context["pma_theme_image"] ?? null), "text_dir" =>         // line 121
($context["text_dir"] ?? null), "tbl_is_view" =>         // line 122
($context["tbl_is_view"] ?? null), "db_is_system_schema" =>         // line 123
($context["db_is_system_schema"] ?? null), "tbl_storage_engine" =>         // line 124
($context["tbl_storage_engine"] ?? null), "central_columns_work" =>         // line 125
($context["central_columns_work"] ?? null)]);
        // line 127
        echo "</form>
<hr class=\"print_ignore\"/>";
        // line 129
        $this->loadTemplate("table/structure/move_columns_dialog.twig", "table/structure/display_structure.twig", 129)->display(["db" =>         // line 130
($context["db"] ?? null), "table" =>         // line 131
($context["table"] ?? null)]);
        // line 134
        echo "<div id=\"structure-action-links\">";
        // line 135
        if ((($context["tbl_is_view"] ?? null) &&  !($context["db_is_system_schema"] ?? null))) {
            // line 136
            echo PhpMyAdmin\Util::linkOrButton(            // line 137
($context["edit_view_url"] ?? null), PhpMyAdmin\Util::getIcon("b_edit", _gettext("Edit view"), true));
        }
        // line 141
        $this->loadTemplate("table/structure/optional_action_links.twig", "table/structure/display_structure.twig", 141)->display(["url_query" =>         // line 142
($context["url_query"] ?? null), "tbl_is_view" =>         // line 143
($context["tbl_is_view"] ?? null), "db_is_system_schema" =>         // line 144
($context["db_is_system_schema"] ?? null), "table" =>         // line 145
($context["table"] ?? null), "is_active" =>         // line 146
($context["is_active"] ?? null)]);
        // line 148
        echo "</div>";
        // line 149
        if (( !($context["tbl_is_view"] ?? null) &&  !($context["db_is_system_schema"] ?? null))) {
            // line 150
            $this->loadTemplate("table/structure/add_column.twig", "table/structure/display_structure.twig", 150)->display(["columns_list" =>             // line 151
($context["columns_list"] ?? null), "db" =>             // line 152
($context["db"] ?? null), "table" =>             // line 153
($context["table"] ?? null)]);
        }
        // line 158
        if ((( !($context["tbl_is_view"] ?? null) &&  !($context["db_is_system_schema"] ?? null)) && ("ARCHIVE" !=         // line 159
($context["tbl_storage_engine"] ?? null)))) {
            // line 160
            echo PhpMyAdmin\Index::getHtmlForDisplayIndexes();
        }
        // line 164
        if (($context["have_partitioning"] ?? null)) {
            // line 166
            if (( !twig_test_empty(($context["partition_names"] ?? null)) &&  !(null === $this->getAttribute(($context["partition_names"] ?? null), 0, [], "array")))) {
                // line 167
                $context["partitions"] = PhpMyAdmin\Partition::getPartitions(($context["db"] ?? null), ($context["table"] ?? null));
                // line 168
                $context["first_partition"] = $this->getAttribute(($context["partitions"] ?? null), 0, [], "array");
                // line 169
                $context["range_or_list"] = (((($this->getAttribute(($context["first_partition"] ?? null), "getMethod", [], "method") == "RANGE") || ($this->getAttribute(                // line 170
($context["first_partition"] ?? null), "getMethod", [], "method") == "RANGE COLUMNS")) || ($this->getAttribute(                // line 171
($context["first_partition"] ?? null), "getMethod", [], "method") == "LIST")) || ($this->getAttribute(                // line 172
($context["first_partition"] ?? null), "getMethod", [], "method") == "LIST COLUMNS"));
                // line 173
                $context["sub_partitions"] = $this->getAttribute(($context["first_partition"] ?? null), "getSubPartitions", [], "method");
                // line 174
                $context["has_sub_partitions"] = $this->getAttribute(($context["first_partition"] ?? null), "hasSubPartitions", [], "method");
                // line 175
                if (($context["has_sub_partitions"] ?? null)) {
                    // line 176
                    $context["first_sub_partition"] = $this->getAttribute(($context["sub_partitions"] ?? null), 0, [], "array");
                }
                // line 179
                $context["action_icons"] = ["ANALYZE" => PhpMyAdmin\Util::getIcon("b_search", _gettext("Analyze")), "CHECK" => PhpMyAdmin\Util::getIcon("eye", _gettext("Check")), "OPTIMIZE" => PhpMyAdmin\Util::getIcon("normalize", _gettext("Optimize")), "REBUILD" => PhpMyAdmin\Util::getIcon("s_tbl", _gettext("Rebuild")), "REPAIR" => PhpMyAdmin\Util::getIcon("b_tblops", _gettext("Repair")), "TRUNCATE" => PhpMyAdmin\Util::getIcon("b_empty", _gettext("Truncate"))];
                // line 187
                if (($context["range_or_list"] ?? null)) {
                    // line 188
                    $context["action_icons"] = twig_array_merge(($context["action_icons"] ?? null), ["DROP" => PhpMyAdmin\Util::getIcon("b_drop", _gettext("Drop"))]);
                }
                // line 191
                echo PhpMyAdmin\Util::getDivForSliderEffect("partitions", _gettext("Partitions"));
                // line 193
                $context["remove_sql"] = (("ALTER TABLE " . PhpMyAdmin\Util::backquote(($context["table"] ?? null))) . " REMOVE PARTITIONING");
                // line 194
                $context["remove_url"] = ((("sql.php" . ($context["url_query"] ?? null)) . "&sql_query=") . twig_urlencode_filter(($context["remove_sql"] ?? null)));
                // line 196
                $this->loadTemplate("table/structure/display_partitions.twig", "table/structure/display_structure.twig", 196)->display(["db" =>                 // line 197
($context["db"] ?? null), "table" =>                 // line 198
($context["table"] ?? null), "url_query" =>                 // line 199
($context["url_query"] ?? null), "partitions" =>                 // line 200
($context["partitions"] ?? null), "partition_method" => $this->getAttribute(                // line 201
($context["first_partition"] ?? null), "getMethod", [], "method"), "partition_expression" => $this->getAttribute(                // line 202
($context["first_partition"] ?? null), "getExpression", [], "method"), "has_description" =>  !twig_test_empty($this->getAttribute(                // line 203
($context["first_partition"] ?? null), "getDescription", [], "method")), "has_sub_partitions" =>                 // line 204
($context["has_sub_partitions"] ?? null), "sub_partition_method" => ((                // line 205
($context["has_sub_partitions"] ?? null)) ? ($this->getAttribute(($context["first_sub_partition"] ?? null), "getMethod", [], "method")) : ("")), "sub_partition_expression" => ((                // line 206
($context["has_sub_partitions"] ?? null)) ? ($this->getAttribute(($context["first_sub_partition"] ?? null), "getExpression", [], "method")) : ("")), "action_icons" =>                 // line 207
($context["action_icons"] ?? null), "range_or_list" =>                 // line 208
($context["range_or_list"] ?? null), "remove_url" =>                 // line 209
($context["remove_url"] ?? null)]);
            } else {
                // line 212
                $this->loadTemplate("table/structure/display_partitions.twig", "table/structure/display_structure.twig", 212)->display(["db" =>                 // line 213
($context["db"] ?? null), "table" =>                 // line 214
($context["table"] ?? null)]);
            }
            // line 218
            echo "    </div>";
        }
        // line 222
        if (($context["show_stats"] ?? null)) {
            // line 223
            echo ($context["table_stats"] ?? null);
        }
        // line 225
        echo "<div class=\"clearfloat\"></div>
";
    }

    public function getTemplateName()
    {
        return "table/structure/display_structure.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  281 => 225,  278 => 223,  276 => 222,  273 => 218,  270 => 214,  269 => 213,  268 => 212,  265 => 209,  264 => 208,  263 => 207,  262 => 206,  261 => 205,  260 => 204,  259 => 203,  258 => 202,  257 => 201,  256 => 200,  255 => 199,  254 => 198,  253 => 197,  252 => 196,  250 => 194,  248 => 193,  246 => 191,  243 => 188,  241 => 187,  239 => 179,  236 => 176,  234 => 175,  232 => 174,  230 => 173,  228 => 172,  227 => 171,  226 => 170,  225 => 169,  223 => 168,  221 => 167,  219 => 166,  217 => 164,  214 => 160,  212 => 159,  211 => 158,  208 => 153,  207 => 152,  206 => 151,  205 => 150,  203 => 149,  201 => 148,  199 => 146,  198 => 145,  197 => 144,  196 => 143,  195 => 142,  194 => 141,  191 => 137,  190 => 136,  188 => 135,  186 => 134,  184 => 131,  183 => 130,  182 => 129,  179 => 127,  177 => 125,  176 => 124,  175 => 123,  174 => 122,  173 => 121,  172 => 120,  171 => 119,  167 => 116,  161 => 114,  158 => 111,  157 => 110,  156 => 109,  155 => 108,  154 => 107,  153 => 106,  152 => 105,  151 => 104,  150 => 103,  149 => 102,  148 => 101,  147 => 100,  146 => 99,  145 => 98,  144 => 97,  143 => 96,  141 => 95,  139 => 93,  138 => 92,  137 => 91,  136 => 90,  135 => 89,  134 => 88,  133 => 87,  132 => 86,  131 => 85,  130 => 84,  129 => 83,  128 => 82,  127 => 81,  126 => 80,  125 => 79,  124 => 77,  123 => 73,  122 => 72,  121 => 71,  119 => 70,  116 => 66,  114 => 65,  111 => 61,  109 => 60,  106 => 57,  103 => 55,  101 => 54,  98 => 53,  96 => 52,  94 => 51,  92 => 50,  90 => 47,  88 => 45,  86 => 44,  83 => 41,  79 => 38,  77 => 37,  75 => 36,  72 => 33,  70 => 31,  68 => 30,  66 => 29,  64 => 27,  62 => 26,  60 => 25,  56 => 24,  54 => 23,  52 => 22,  50 => 20,  48 => 18,  47 => 17,  46 => 16,  45 => 15,  41 => 11,  38 => 10,  35 => 8,  33 => 7,  31 => 6,  29 => 5,  25 => 3,  22 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "table/structure/display_structure.twig", "D:\\phpstudy_pro\\WWW\\back\\public\\phpMyAdmin4.8.5\\templates\\table\\structure\\display_structure.twig");
    }
}
