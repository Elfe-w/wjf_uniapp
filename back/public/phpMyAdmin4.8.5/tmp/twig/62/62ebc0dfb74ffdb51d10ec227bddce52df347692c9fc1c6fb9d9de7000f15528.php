<?php

/* columns_definitions/column_attributes.twig */
class __TwigTemplate_2018634ae165e91e6adfc14b66c9dfec1919dfd9b228439c458b171246f3afed extends Twig_Template
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
        // line 2
        $context["ci"] = 0;
        // line 6
        $context["ci_offset"] =  -1;
        // line 7
        echo "
<td class=\"center\">";
        // line 10
        $this->loadTemplate("columns_definitions/column_name.twig", "columns_definitions/column_attributes.twig", 10)->display(["column_number" =>         // line 11
($context["column_number"] ?? null), "ci" =>         // line 12
($context["ci"] ?? null), "ci_offset" =>         // line 13
($context["ci_offset"] ?? null), "column_meta" =>         // line 14
($context["column_meta"] ?? null), "cfg_relation" =>         // line 15
($context["cfg_relation"] ?? null), "max_rows" =>         // line 16
($context["max_rows"] ?? null)]);
        // line 18
        $context["ci"] = (($context["ci"] ?? null) + 1);
        // line 19
        echo "</td>
<td class=\"center\">";
        // line 22
        $this->loadTemplate("columns_definitions/column_type.twig", "columns_definitions/column_attributes.twig", 22)->display(["column_number" =>         // line 23
($context["column_number"] ?? null), "ci" =>         // line 24
($context["ci"] ?? null), "ci_offset" =>         // line 25
($context["ci_offset"] ?? null), "column_meta" =>         // line 26
($context["column_meta"] ?? null), "type_upper" =>         // line 27
($context["type_upper"] ?? null)]);
        // line 29
        $context["ci"] = (($context["ci"] ?? null) + 1);
        // line 30
        echo "</td>
<td class=\"center\">";
        // line 33
        $this->loadTemplate("columns_definitions/column_length.twig", "columns_definitions/column_attributes.twig", 33)->display(["column_number" =>         // line 34
($context["column_number"] ?? null), "ci" =>         // line 35
($context["ci"] ?? null), "ci_offset" =>         // line 36
($context["ci_offset"] ?? null), "length_values_input_size" =>         // line 37
($context["length_values_input_size"] ?? null), "length_to_display" =>         // line 38
($context["length"] ?? null)]);
        // line 40
        $context["ci"] = (($context["ci"] ?? null) + 1);
        // line 41
        echo "</td>
<td class=\"center\">";
        // line 44
        $this->loadTemplate("columns_definitions/column_default.twig", "columns_definitions/column_attributes.twig", 44)->display(["column_number" =>         // line 45
($context["column_number"] ?? null), "ci" =>         // line 46
($context["ci"] ?? null), "ci_offset" =>         // line 47
($context["ci_offset"] ?? null), "column_meta" =>         // line 48
($context["column_meta"] ?? null), "type_upper" =>         // line 49
($context["type_upper"] ?? null), "char_editing" =>         // line 50
($context["char_editing"] ?? null)]);
        // line 52
        $context["ci"] = (($context["ci"] ?? null) + 1);
        // line 53
        echo "</td>
<td class=\"center\">";
        // line 56
        echo PhpMyAdmin\Charsets::getCollationDropdownBox(        // line 57
($context["dbi"] ?? null),         // line 58
($context["disable_is"] ?? null), (("field_collation[" .         // line 59
($context["column_number"] ?? null)) . "]"), ((("field_" .         // line 60
($context["column_number"] ?? null)) . "_") . (($context["ci"] ?? null) - ($context["ci_offset"] ?? null))), (( !twig_test_empty($this->getAttribute(        // line 61
($context["column_meta"] ?? null), "Collation", [], "array"))) ? ($this->getAttribute(($context["column_meta"] ?? null), "Collation", [], "array")) : (null)), false);
        // line 64
        $context["ci"] = (($context["ci"] ?? null) + 1);
        // line 65
        echo "</td>
<td class=\"center\">";
        // line 68
        $this->loadTemplate("columns_definitions/column_attribute.twig", "columns_definitions/column_attributes.twig", 68)->display(["column_number" =>         // line 69
($context["column_number"] ?? null), "ci" =>         // line 70
($context["ci"] ?? null), "ci_offset" =>         // line 71
($context["ci_offset"] ?? null), "column_meta" =>         // line 72
($context["column_meta"] ?? null), "extracted_columnspec" =>         // line 73
($context["extracted_columnspec"] ?? null), "submit_attribute" =>         // line 74
($context["submit_attribute"] ?? null), "attribute_types" =>         // line 75
($context["attribute_types"] ?? null)]);
        // line 77
        $context["ci"] = (($context["ci"] ?? null) + 1);
        // line 78
        echo "</td>
<td class=\"center\">";
        // line 81
        $this->loadTemplate("columns_definitions/column_null.twig", "columns_definitions/column_attributes.twig", 81)->display(["column_number" =>         // line 82
($context["column_number"] ?? null), "ci" =>         // line 83
($context["ci"] ?? null), "ci_offset" =>         // line 84
($context["ci_offset"] ?? null), "column_meta" =>         // line 85
($context["column_meta"] ?? null)]);
        // line 87
        $context["ci"] = (($context["ci"] ?? null) + 1);
        // line 88
        echo "</td>";
        // line 89
        if (((isset($context["change_column"]) || array_key_exists("change_column", $context)) &&  !twig_test_empty(($context["change_column"] ?? null)))) {
            // line 91
            echo "    <td class=\"center\">";
            // line 92
            $this->loadTemplate("columns_definitions/column_adjust_privileges.twig", "columns_definitions/column_attributes.twig", 92)->display(["column_number" =>             // line 93
($context["column_number"] ?? null), "ci" =>             // line 94
($context["ci"] ?? null), "ci_offset" =>             // line 95
($context["ci_offset"] ?? null), "privs_available" =>             // line 96
($context["privs_available"] ?? null)]);
            // line 98
            $context["ci"] = (($context["ci"] ?? null) + 1);
            // line 99
            echo "    </td>";
        }
        // line 101
        if ( !($context["is_backup"] ?? null)) {
            // line 103
            echo "    <td class=\"center\">";
            // line 104
            $this->loadTemplate("columns_definitions/column_indexes.twig", "columns_definitions/column_attributes.twig", 104)->display(["column_number" =>             // line 105
($context["column_number"] ?? null), "ci" =>             // line 106
($context["ci"] ?? null), "ci_offset" =>             // line 107
($context["ci_offset"] ?? null), "column_meta" =>             // line 108
($context["column_meta"] ?? null)]);
            // line 110
            $context["ci"] = (($context["ci"] ?? null) + 1);
            // line 111
            echo "    </td>";
        }
        // line 113
        echo "<td class=\"center\">";
        // line 115
        $this->loadTemplate("columns_definitions/column_auto_increment.twig", "columns_definitions/column_attributes.twig", 115)->display(["column_number" =>         // line 116
($context["column_number"] ?? null), "ci" =>         // line 117
($context["ci"] ?? null), "ci_offset" =>         // line 118
($context["ci_offset"] ?? null), "column_meta" =>         // line 119
($context["column_meta"] ?? null)]);
        // line 121
        $context["ci"] = (($context["ci"] ?? null) + 1);
        // line 122
        echo "</td>
<td class=\"center\">";
        // line 125
        $this->loadTemplate("columns_definitions/column_comment.twig", "columns_definitions/column_attributes.twig", 125)->display(["column_number" =>         // line 126
($context["column_number"] ?? null), "ci" =>         // line 127
($context["ci"] ?? null), "ci_offset" =>         // line 128
($context["ci_offset"] ?? null), "max_length" =>         // line 129
($context["max_length"] ?? null), "value" => (((($this->getAttribute(        // line 130
($context["column_meta"] ?? null), "Field", [], "array", true, true) && twig_test_iterable(        // line 131
($context["comments_map"] ?? null))) && $this->getAttribute(        // line 132
($context["comments_map"] ?? null), $this->getAttribute(($context["column_meta"] ?? null), "Field", [], "array"), [], "array", true, true))) ? (twig_escape_filter($this->env, $this->getAttribute(        // line 133
($context["comments_map"] ?? null), $this->getAttribute(($context["column_meta"] ?? null), "Field", [], "array"), [], "array"))) : (""))]);
        // line 135
        $context["ci"] = (($context["ci"] ?? null) + 1);
        // line 136
        echo "</td>";
        // line 138
        if (($context["is_virtual_columns_supported"] ?? null)) {
            // line 139
            echo "    <td class=\"center\">";
            // line 140
            $this->loadTemplate("columns_definitions/column_virtuality.twig", "columns_definitions/column_attributes.twig", 140)->display(["column_number" =>             // line 141
($context["column_number"] ?? null), "ci" =>             // line 142
($context["ci"] ?? null), "ci_offset" =>             // line 143
($context["ci_offset"] ?? null), "column_meta" =>             // line 144
($context["column_meta"] ?? null), "char_editing" =>             // line 145
($context["char_editing"] ?? null), "expression" => (($this->getAttribute(            // line 146
($context["column_meta"] ?? null), "Expression", [], "array", true, true)) ? ($this->getAttribute(($context["column_meta"] ?? null), "Expression", [], "array")) : ("")), "options" =>             // line 147
($context["options"] ?? null)]);
            // line 149
            $context["ci"] = (($context["ci"] ?? null) + 1);
            // line 150
            echo "    </td>";
        }
        // line 153
        if ((isset($context["fields_meta"]) || array_key_exists("fields_meta", $context))) {
            // line 154
            $context["current_index"] = 0;
            // line 155
            $context["cols"] = (twig_length_filter($this->env, ($context["move_columns"] ?? null)) - 1);
            // line 156
            $context["break"] = false;
            // line 157
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(range(0, ($context["cols"] ?? null)));
            foreach ($context['_seq'] as $context["_key"] => $context["mi"]) {
                if ((($this->getAttribute($this->getAttribute(($context["move_columns"] ?? null), $context["mi"], [], "array"), "name", []) == $this->getAttribute(($context["column_meta"] ?? null), "Field", [], "array")) &&  !($context["break"] ?? null))) {
                    // line 158
                    $context["current_index"] = $context["mi"];
                    // line 159
                    $context["break"] = true;
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['mi'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 161
            echo "
    <td class=\"center\">";
            // line 163
            $this->loadTemplate("columns_definitions/move_column.twig", "columns_definitions/column_attributes.twig", 163)->display(["column_number" =>             // line 164
($context["column_number"] ?? null), "ci" =>             // line 165
($context["ci"] ?? null), "ci_offset" =>             // line 166
($context["ci_offset"] ?? null), "column_meta" =>             // line 167
($context["column_meta"] ?? null), "move_columns" =>             // line 168
($context["move_columns"] ?? null), "current_index" =>             // line 169
($context["current_index"] ?? null)]);
            // line 171
            $context["ci"] = (($context["ci"] ?? null) + 1);
            // line 172
            echo "    </td>";
        }
        // line 175
        if ((($this->getAttribute(($context["cfg_relation"] ?? null), "mimework", [], "array") && ($context["browse_mime"] ?? null)) && $this->getAttribute(($context["cfg_relation"] ?? null), "commwork", [], "array"))) {
            // line 176
            echo "    <td class=\"center\">";
            // line 178
            $this->loadTemplate("columns_definitions/mime_type.twig", "columns_definitions/column_attributes.twig", 178)->display(["column_number" =>             // line 179
($context["column_number"] ?? null), "ci" =>             // line 180
($context["ci"] ?? null), "ci_offset" =>             // line 181
($context["ci_offset"] ?? null), "column_meta" =>             // line 182
($context["column_meta"] ?? null), "available_mime" =>             // line 183
($context["available_mime"] ?? null), "mime_map" =>             // line 184
($context["mime_map"] ?? null)]);
            // line 186
            $context["ci"] = (($context["ci"] ?? null) + 1);
            // line 187
            echo "    </td>
    <td class=\"center\">";
            // line 190
            $this->loadTemplate("columns_definitions/transformation.twig", "columns_definitions/column_attributes.twig", 190)->display(["column_number" =>             // line 191
($context["column_number"] ?? null), "ci" =>             // line 192
($context["ci"] ?? null), "ci_offset" =>             // line 193
($context["ci_offset"] ?? null), "column_meta" =>             // line 194
($context["column_meta"] ?? null), "available_mime" =>             // line 195
($context["available_mime"] ?? null), "mime_map" =>             // line 196
($context["mime_map"] ?? null), "type" => "transformation"]);
            // line 199
            $context["ci"] = (($context["ci"] ?? null) + 1);
            // line 200
            echo "    </td>
    <td class=\"center\">";
            // line 203
            $this->loadTemplate("columns_definitions/transformation_option.twig", "columns_definitions/column_attributes.twig", 203)->display(["column_number" =>             // line 204
($context["column_number"] ?? null), "ci" =>             // line 205
($context["ci"] ?? null), "ci_offset" =>             // line 206
($context["ci_offset"] ?? null), "column_meta" =>             // line 207
($context["column_meta"] ?? null), "mime_map" =>             // line 208
($context["mime_map"] ?? null), "type_prefix" => ""]);
            // line 211
            $context["ci"] = (($context["ci"] ?? null) + 1);
            // line 212
            echo "    </td>
    <td class=\"center\">";
            // line 215
            $this->loadTemplate("columns_definitions/transformation.twig", "columns_definitions/column_attributes.twig", 215)->display(["column_number" =>             // line 216
($context["column_number"] ?? null), "ci" =>             // line 217
($context["ci"] ?? null), "ci_offset" =>             // line 218
($context["ci_offset"] ?? null), "column_meta" =>             // line 219
($context["column_meta"] ?? null), "available_mime" =>             // line 220
($context["available_mime"] ?? null), "mime_map" =>             // line 221
($context["mime_map"] ?? null), "type" => "input_transformation"]);
            // line 224
            $context["ci"] = (($context["ci"] ?? null) + 1);
            // line 225
            echo "    </td>
    <td class=\"center\">";
            // line 228
            $this->loadTemplate("columns_definitions/transformation_option.twig", "columns_definitions/column_attributes.twig", 228)->display(["column_number" =>             // line 229
($context["column_number"] ?? null), "ci" =>             // line 230
($context["ci"] ?? null), "ci_offset" =>             // line 231
($context["ci_offset"] ?? null), "column_meta" =>             // line 232
($context["column_meta"] ?? null), "mime_map" =>             // line 233
($context["mime_map"] ?? null), "type_prefix" => "input_"]);
            // line 236
            $context["ci"] = (($context["ci"] ?? null) + 1);
            // line 237
            echo "    </td>";
        }
    }

    public function getTemplateName()
    {
        return "columns_definitions/column_attributes.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  289 => 237,  287 => 236,  285 => 233,  284 => 232,  283 => 231,  282 => 230,  281 => 229,  280 => 228,  277 => 225,  275 => 224,  273 => 221,  272 => 220,  271 => 219,  270 => 218,  269 => 217,  268 => 216,  267 => 215,  264 => 212,  262 => 211,  260 => 208,  259 => 207,  258 => 206,  257 => 205,  256 => 204,  255 => 203,  252 => 200,  250 => 199,  248 => 196,  247 => 195,  246 => 194,  245 => 193,  244 => 192,  243 => 191,  242 => 190,  239 => 187,  237 => 186,  235 => 184,  234 => 183,  233 => 182,  232 => 181,  231 => 180,  230 => 179,  229 => 178,  227 => 176,  225 => 175,  222 => 172,  220 => 171,  218 => 169,  217 => 168,  216 => 167,  215 => 166,  214 => 165,  213 => 164,  212 => 163,  209 => 161,  202 => 159,  200 => 158,  195 => 157,  193 => 156,  191 => 155,  189 => 154,  187 => 153,  184 => 150,  182 => 149,  180 => 147,  179 => 146,  178 => 145,  177 => 144,  176 => 143,  175 => 142,  174 => 141,  173 => 140,  171 => 139,  169 => 138,  167 => 136,  165 => 135,  163 => 133,  162 => 132,  161 => 131,  160 => 130,  159 => 129,  158 => 128,  157 => 127,  156 => 126,  155 => 125,  152 => 122,  150 => 121,  148 => 119,  147 => 118,  146 => 117,  145 => 116,  144 => 115,  142 => 113,  139 => 111,  137 => 110,  135 => 108,  134 => 107,  133 => 106,  132 => 105,  131 => 104,  129 => 103,  127 => 101,  124 => 99,  122 => 98,  120 => 96,  119 => 95,  118 => 94,  117 => 93,  116 => 92,  114 => 91,  112 => 89,  110 => 88,  108 => 87,  106 => 85,  105 => 84,  104 => 83,  103 => 82,  102 => 81,  99 => 78,  97 => 77,  95 => 75,  94 => 74,  93 => 73,  92 => 72,  91 => 71,  90 => 70,  89 => 69,  88 => 68,  85 => 65,  83 => 64,  81 => 61,  80 => 60,  79 => 59,  78 => 58,  77 => 57,  76 => 56,  73 => 53,  71 => 52,  69 => 50,  68 => 49,  67 => 48,  66 => 47,  65 => 46,  64 => 45,  63 => 44,  60 => 41,  58 => 40,  56 => 38,  55 => 37,  54 => 36,  53 => 35,  52 => 34,  51 => 33,  48 => 30,  46 => 29,  44 => 27,  43 => 26,  42 => 25,  41 => 24,  40 => 23,  39 => 22,  36 => 19,  34 => 18,  32 => 16,  31 => 15,  30 => 14,  29 => 13,  28 => 12,  27 => 11,  26 => 10,  23 => 7,  21 => 6,  19 => 2,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "columns_definitions/column_attributes.twig", "D:\\phpstudy_pro\\WWW\\back\\public\\phpMyAdmin4.8.5\\templates\\columns_definitions\\column_attributes.twig");
    }
}
