<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use app\modules\main\models\Lang;

/* @var $this yii\web\View */
/* @var $model app\modules\editor\models\TreeDiagram */
/* @var $level_model app\modules\editor\models\Level */
/* @var $node_model app\modules\editor\models\Node */
/* @var $level_model_all app\modules\editor\controllers\TreeDiagramsController */
/* @var $level_model_count app\modules\editor\controllers\TreeDiagramsController */
/* @var $initial_event_model_all app\modules\editor\controllers\TreeDiagramsController */
/* @var $sequence_model_all app\modules\editor\controllers\TreeDiagramsController */
/* @var $event_model_all app\modules\editor\controllers\TreeDiagramsController */
/* @var $mechanism_model_all app\modules\editor\controllers\TreeDiagramsController */
/* @var $array_levels app\modules\editor\controllers\TreeDiagramsController */
/* @var $array_levels_initial_without app\modules\editor\controllers\TreeDiagramsController */

$this->title = Yii::t('app', 'TREE_DIAGRAMS_PAGE_VISUAL_DIAGRAM') . ' - ' . $model->name;

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'TREE_DIAGRAMS_PAGE_TREE_DIAGRAMS'),
    'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

$this->params['menu'] = [
    ['label' => Yii::t('app', 'NAV_ADD_LEVEL'), 'url' => '#',
        'options' => ['id'=>'nav_add_level', 'class' => 'enabled',
            'data-toggle'=>'modal', 'data-target'=>'#addLevelModalForm']],
    ['label' => Yii::t('app', 'NAV_ADD_EVENT'), 'url' => '#',
        'options' => ['id'=>'nav_add_event', 'class' => 'disabled',
            'data-toggle'=>'modal', 'data-target'=>'']],
    ['label' => Yii::t('app', 'NAV_ADD_MECHANISM'), 'url' => '#',
        'options' => ['id'=>'nav_add_mechanism', 'class' => 'disabled',
            'data-toggle'=>'modal', 'data-target'=>'']],
];
?>

<?php Pjax::begin(); ?>
<?= Html::a("Обновить", ['/tree-diagrams/visual-diagram/' . $model->id],
    ['id' => 'pjax-sequence-mas-button', 'style' => 'display:none']) ?>
<?php
// создаем массив из соотношения level и node для передачи в jsplumb
$sequence_mas = array();
foreach ($sequence_model_all as $s){
    array_push($sequence_mas, [$s->level, $s->node]);
}
?>
<?php Pjax::end(); ?>


<?php
// создаем массив из соотношения id и parent_node для передачи в jsplumb
$node_mas = array();
foreach ($node_model_all as $n){
    array_push($node_mas, [$n->id, $n->parent_node, $n->name, $n->description]);
}

$level_mas = array();
foreach ($level_model_all as $l){
    array_push($level_mas, [$l->id, $l->parent_level, $l->name, $l->description]);
}

?>


<?= $this->render('_modal_form_level_editor', [
    'model' => $model,
    'level_model' => $level_model,
]) ?>

<?= $this->render('_modal_form_relationship', [
    'model' => $model,
]) ?>

<?php Pjax::begin(); ?>

<?= Html::a("Обновить", ['/tree-diagrams/visual-diagram/' . $model->id],
    ['id' => 'pjax-event-editor-button', 'style' => 'display:none']) ?>

<?= $this->render('_modal_form_event_editor', [
    'model' => $model,
    'node_model' => $node_model,
    'array_levels' => $array_levels,
]) ?>

<?= $this->render('_modal_form_mechanism_editor', [
    'model' => $model,
    'node_model' => $node_model,
    'array_levels_initial_without' => $array_levels_initial_without,
]) ?>

<?php Pjax::end(); ?>

<?= $this->render('_modal_form_view_message', [
]) ?>


<!-- Подключение скрипта для модальных форм -->
<?php
$this->registerJsFile('/js/modal-form.js', ['position' => yii\web\View::POS_HEAD]);
$this->registerCssFile('/css/visual-diagram.css', ['position'=>yii\web\View::POS_HEAD]);

$this->registerJsFile('/js/jsplumb.js', ['position'=>yii\web\View::POS_HEAD]);  // jsPlumb 2.12.9
//$this->registerJsFile('/js/visual-diagram.js', ['position'=>yii\web\View::POS_HEAD]);
?>

<script type="text/javascript">
    $(document).ready(function() {
        // Включение переходов на модальные окна
        var nav_add_event = document.getElementById('nav_add_event');
        var nav_add_mechanism = document.getElementById('nav_add_mechanism');
        if ('<?php echo $level_model_count; ?>' > 0){
            nav_add_event.className = 'enabled';
            nav_add_event.setAttribute("data-target", "#addEventModalForm");
        }
        if ('<?php echo $level_model_count; ?>' > 1){
            nav_add_mechanism.className = 'enabled';
            nav_add_mechanism.setAttribute("data-target", "#addMechanismModalForm");
        }

        // Обработка закрытия модального окна добавления нового уровня
        $("#addLevelModalForm").on("hidden.bs.modal", function() {
            // Скрытие списка ошибок ввода в модальном окне
            $("#add-level-form .error-summary").hide();
            $("#add-level-form .form-group").each(function() {
                $(this).removeClass("has-error");
                $(this).removeClass("has-success");
            });
            $("#add-level-form .help-block").each(function() {
                $(this).text("");
            });
        });

        // Обработка закрытия модального окна добавления нового события
        $("#addEventModalForm").on("hidden.bs.modal", function() {
            // Скрытие списка ошибок ввода в модальном окне
            $("#add-event-form .error-summary").hide();
            $("#add-event-form .form-group").each(function() {
                $(this).removeClass("has-error");
                $(this).removeClass("has-success");
            });
            $("#add-event-form .help-block").each(function() {
                $(this).text("");
            });
        });

        // Обработка закрытия модального окна добавления нового механизма
        $("#addMechanismModalForm").on("hidden.bs.modal", function() {
            // Скрытие списка ошибок ввода в модальном окне
            $("#add-mechanism-form .error-summary").hide();
            $("#add-mechanism-form .form-group").each(function() {
                $(this).removeClass("has-error");
                $(this).removeClass("has-success");
            });
            $("#add-mechanism-form .help-block").each(function() {
                $(this).text("");
            });
        });
    });

    var node_id_on_click = 0;
    var level_id_on_click = 0;

    var id_target;

    var sequence_mas = <?php echo json_encode($sequence_mas); ?>;//прием массива из php
    var node_mas = <?php echo json_encode($node_mas); ?>;//прием массива из php
    var level_mas = <?php echo json_encode($level_mas); ?>;//прием массива из php

    var mas_data_level = {};
    var q = 0;
    var id_level = "";
    var name_level = "";
    var description_level = "";
    $.each(level_mas, function (i, mas) {
        $.each(mas, function (j, elem) {
            if (j == 0) {id_level = elem;}
            if (j == 2) {name_level = elem;}
            if (j == 3) {description_level = elem;}
            mas_data_level[q] = {
                "id_level":id_level,
                "name":name_level,
                "description":description_level,
            }
        });
        q = q+1;
    });

    var mas_data_node = {};
    var q = 0;
    var id_node = "";
    var id_parent_node = "";
    var name_node = "";
    var description_node = "";
    $.each(node_mas, function (i, mas) {
        $.each(mas, function (j, elem) {
            //первый элемент это id уровня
            if (j == 0) {id_node = elem;}//записываем id уровня
            //второй элемент это id узла события или механизма
            if (j == 1) {id_parent_node = elem;}//записываем id узла события node или механизма mechanism
            if (j == 2) {name_node = elem;}
            if (j == 3) {description_node = elem;}
            mas_data_node[q] = {
                "id":id_node,
                "parent_node":id_parent_node,
                "name":name_node,
                "description":description_node,
            }
        });
        q = q+1;
    });


    var instance = "";
    jsPlumb.ready(function () {
        instance = jsPlumb.getInstance({
            Connector:["Flowchart", {cornerRadius:5}], //стиль соединения линии ломанный с радиусом
            Endpoint:["Dot", {radius:1}], //стиль точки соединения
            EndpointStyle: { fill: '#337ab7' }, //цвет точки соединения
            PaintStyle : { strokeWidth:2, stroke: "#337ab7", fill: "transparent",},//стиль линии
            HoverPaintStyle: {stroke: "#d00006", strokeWidth: 4 },
            Overlays:[["PlainArrow", {location:1, width:15, length:15}]], //стрелка
            ConnectionOverlays: [
                [ "Label", {
                    label: "",
                    id: "label_connector",
                    //cssClass: "aLabel"
                }]
            ],
            Container: "visual_diagram_field"
        });


        var group_name = "";
        //разбор полученного массива
        $.each(sequence_mas, function (i, mas) {
            $.each(mas, function (j, elem) {
                //первый элемент это id уровня
                if (j == 0) {
                    id_level = elem;//записываем id уровня
                    //находим DOM элемент description уровня (идентификатор div level_description)
                    var div_level_id = document.getElementById('level_description_'+ id_level);
                    group_name = 'group'+ id_level; //определяем имя группы
                    var grp = instance.getGroup(group_name);//определяем существует ли группа с таким именем
                    if (grp == 0){
                        //если группа не существует то создаем группу с определенным именем group_name
                        instance.addGroup({
                            el: div_level_id,
                            id: group_name,
                            draggable: false, //перетаскивание группы
                            //constrain: true, //запрет на перетаскивание элементов за группу (false перетаскивать можно)
                            dropOverride:true,
                        });
                    }
                }

                //второй элемент это id узла события или механизма
                if (j == 1) {
                    var id_node = elem;//записываем id узла события node или механизма mechanism
                    //находим DOM элемент node (идентификатор div node)
                    var div_node_id = document.getElementById('node_'+ elem);
                    //делаем node перетаскиваемым
                    instance.draggable(div_node_id);
                    //добавляем элемент div_node_id в группу с именем group_name
                    instance.addToGroup(group_name, div_node_id);
                }
            });
        });


        var windows = jsPlumb.getSelector(".node");

        instance.bind("beforeDrop", function (info) {
            var source_node = document.getElementById(info.sourceId);
            var target_node = document.getElementById(info.targetId);

            var source_level = source_node.offsetParent.getAttribute('id');
            var target_level = target_node.offsetParent.getAttribute('id');

            var source_id_level = parseInt(source_level.match(/\d+/));
            var target_id_level = parseInt(target_level.match(/\d+/));


            //построение одномерного массива по порядку следования уровней
            var mas_level_order = {};
            var q = 0;
            var id_l = "";
            var id_p_l = "";
            var next_parent_level = "";
            $.each(level_mas, function (i, mas) {
                $.each(mas, function (j, elem) {
                    //первый элемент это id уровня
                    if (j == 0) {id_l = elem;}//записываем id уровня
                    //второй элемент это id родительского уровня
                    if (j == 1) {id_p_l = elem;}//записываем id узла события node или механизма mechanism
                    if (id_p_l == null){
                        mas_level_order[q] = id_l;
                        next_parent_level = id_l;
                        q = q+1;
                    }
                });
                id_l = "";
                id_p_l = "";
            });
            for (let i = 1; i < level_mas.length; i++) {
                $.each(level_mas, function (i, mas) {
                    $.each(mas, function (j, elem) {
                        //первый элемент это id уровня
                        if (j == 0) {id_l = elem;}//записываем id уровня
                        //второй элемент это id родительского уровня
                        if (j == 1) {id_p_l = elem;}//записываем id узла события node или механизма mechanism
                        if (id_p_l == next_parent_level){
                            mas_level_order[q] = id_l;
                            next_parent_level = id_l;
                            q = q+1;
                        }
                    });
                    id_l = "";
                    id_p_l = "";
                });
            }


            //определение порядковых номеров source и target
            var n_source = "";
            var n_target = "";
            $.each(mas_level_order, function (i, elem) {
                if (elem == source_id_level) {n_source = i;}//записываем порядковый номер source
                if (elem == target_id_level) {n_target = i;}//записываем порядковый номер target
            });


            // Запреты
            // ------------------------------
            // запрет на соединение механизмов
            if ((source_node.getAttribute("class").search("mechanism") == target_node.getAttribute("class").search("mechanism"))
                && (source_node.getAttribute("class").search("mechanism") != -1)){
                var message = "<?php echo Yii::t('app', 'MECHANISMS_SHOULD_NOT_BE_INTERCONNECTED'); ?>";
                document.getElementById("message-text").lastChild.nodeValue = message;
                $("#viewMessageModalForm").modal("show");
                return false;
            } else {
                // запрет на соединение c элементами на вышестоящем уровне
                if (n_source > n_target){
                    var message = "<?php echo Yii::t('app', 'ELEMENTS_NOT_BE_ASSOCIATED_WITH_OTHER_ELEMENTS_HIGHER_LEVEL'); ?>";
                    document.getElementById("message-text").lastChild.nodeValue = message;
                    $("#viewMessageModalForm").modal("show");
                    return false;
                } else {
                    // запрет на соединение c элементами кроме механизмов на нижестоящем уровне
                    if ((n_source < n_target) && (target_node.getAttribute("class").search("mechanism") == -1)){
                        var message = "<?php echo Yii::t('app', 'LEVEL_MUST_BEGIN_WITH_MECHANISM'); ?>";
                        document.getElementById("message-text").lastChild.nodeValue = message;
                        $("#viewMessageModalForm").modal("show");
                        return false;
                    } else {
                        if(target_node.getAttribute("class").search("div-initial-event") >= 0){
                            var message = "<?php echo Yii::t('app', 'INITIAL_EVENT_SHOULD_NOT_BE_INCOMING_CONNECTIONS'); ?>";
                            document.getElementById("message-text").lastChild.nodeValue = message;
                            $("#viewMessageModalForm").modal("show");
                            return false;
                        } else {
                            return true;
                        }
                    }
                }
            }
        });


        instance.batch(function () {
            for (var i = 0; i < windows.length; i++) {
                //определяет механизм ли. но нужно его вставить в свойство anchor у makeSource и makeTarget
                var cl = windows[i].className;
                var anchor_top = "";
                var anchor_bottom = "";
                var max_con = 1;
                if (cl == "div-mechanism node jtk-managed jtk-draggable") {
                    anchor_top = [ "Perimeter", { shape: "Triangle", rotation: 90 }];
                    anchor_bottom = [ "Perimeter", { shape: "Triangle", rotation: 90 }];
                } else {
                    anchor_top = "Top";
                    anchor_bottom = "Bottom";
                }

                instance.makeSource(windows[i], {
                    filter: ".ep",
                    anchor: anchor_bottom,
                });

                instance.makeTarget(windows[i], {
                    dropOptions: { hoverClass: "dragHover" },
                    anchor: anchor_top,
                    allowLoopback: false, // Нельзя создать кольцевую связь
                    //anchor: "Top",
                    maxConnections: max_con,
                    onMaxConnections: function (info, e) {
                        var message = "<?php echo Yii::t('app', 'MAXIMUM_CONNECTIONS'); ?>" + info.maxConnections;
                        document.getElementById("message-text").lastChild.nodeValue = message;
                        $("#viewMessageModalForm").modal("show");
                    }
                });
            }

            $.each(mas_data_node, function (j, elem_node) {
                if (elem_node.parent_node != null){
                    instance.connect({
                        source: "node_" + elem_node.parent_node,
                        target: "node_" + elem_node.id,
                    });
                }
            });
        });


        instance.bind("mouseover", function(connection) {
            //console.log("навел")
            var message_label = "<?php echo Yii::t('app', 'LEVEL_DELETE'); ?>";
            connection.addOverlay(["Label", { label: message_label, location:0.5, id: "label_connector", cssClass: "aLabel"} ]);
        });

        instance.bind("mouseout", function(connection) {
            //console.log("отвел")
            connection.removeOverlay("label_connector");
        });

        // Обработка удаления связи
        instance.bind("click", function(connection) {
            //var source_node = connection.sourceId;
            var target_node = connection.targetId;
            //id_source = parseInt(source_node.match(/\d+/));
            id_target = parseInt(target_node.match(/\d+/));
            $("#deleteRelationshipModalForm").modal("show");
        });


        //function setConnectionLabel(connection, label) {
        //    connection.bind("mouseover", function(conn) {
        //        if (conn.hasOwnProperty ('component')) {conn = conn.component}
        //        conn.addOverlay(["Label", { label: label, location:0.5, id: "connLabel"} ]);
        //    });

        //    connection.bind("mouseout", function(conn) {
         //       if (conn.hasOwnProperty ('component')) {conn = conn.component}
        //        conn.removeOverlay("connLabel");
        //    });
        //}

        //setConnectionLabel(connection.connection, "Labeltext");



        instance.bind("connection", function(connection) {
            var source_id = connection.sourceId;
            var target_id = connection.targetId;
            var parent_node_id = parseInt(source_id.match(/\d+/));
            var node_id = parseInt(target_id.match(/\d+/));
            $.ajax({
                //переход на экшен левел
                url: "<?= Yii::$app->request->baseUrl . '/' . Lang::getCurrent()->url .
                '/tree-diagrams/add-relationship/' . $model->id ?>",
                type: "post",
                data: "YII_CSRF_TOKEN=<?= Yii::$app->request->csrfToken ?>" +
                "&parent_node_id=" + parent_node_id + "&node_id=" + node_id,
                dataType: "json",
                success: function(data) {
                    if (data['success']) {
                        $.each(mas_data_node, function (i, elem_node) {
                            //добавляем связь в массив
                            if (data["n_id"] == elem_node.id){
                                mas_data_node[i].parent_node = data["p_n_id"];
                            }
                        });
                    }
                },
                error: function() {
                    alert('Error!');
                }
            });
        });
    });


    //функция расширения уровней и их свертывание
    var mousemoveNode = function(x) {
        var node = document.getElementById(x);
        var level = node.offsetParent;

        var width_level = level.clientWidth;
        var height_level = level.clientHeight;

        var top_layer_width = document.getElementById('top_layer').clientWidth;

        var l = node.offsetLeft + node.clientWidth;
        var h = node.offsetTop + node.clientHeight;

        if (l >= width_level){
            document.getElementById('top_layer').style.width = top_layer_width + 5 + 'px';
        }
        if (h >= height_level){
            level.style.height = height_level + 5 + 'px';
        }
        //------------------------------------------
        //автоматическое свертывание по горизонтали
        var max_width = 0;
        //разбор полученного массива
        $.each(sequence_mas, function (i, mas) {
            $.each(mas, function (j, elem) {
                //второй элемент это id узла события или механизма
                if (j == 1) {
                    var id_node = elem;//записываем id узла события node или механизма mechanism
                    //находим DOM элемент node (идентификатор div node)
                    var div_node_id = document.getElementById('node_'+ elem);

                    var width_node = div_node_id.clientWidth;
                    var w = div_node_id.offsetLeft;
                    var width = width_node + w;

                    if (max_width < width){max_width = width}
                    document.getElementById('top_layer').style.width = max_width + 105 + 'px';
                }
            });
        });
        //------------------------------------------
        //автоматическое свертывание по вертикали
        var mas_data = {};
        var q = 0;
        var id_level = "";
        var id_node = "";
        $.each(sequence_mas, function (i, mas) {
            $.each(mas, function (j, elem) {
                //первый элемент это id уровня
                if (j == 0) {id_level = elem;}//записываем id уровня
                //второй элемент это id узла события или механизма
                if (j == 1) {id_node = elem;}//записываем id узла события node или механизма mechanism
                mas_data[q] = {
                    "level":id_level,
                    "node":id_node,
                }
            });
            q = q+1;
        });

        var mas_otbor = {};
        var q = 0;
        $.each(mas_data, function (i, elem1) {
            var max_height = 0;
            var mas_node = 0;
            var mas_level = 0;
            $.each(mas_data, function (j, elem2) {
                var div_node_2 = document.getElementById('node_'+ elem2.node);
                var height_node = div_node_2.clientHeight;
                var h = div_node_2.offsetTop;
                var height = height_node + h;

                if (elem1.level == elem2.level) {
                    if (max_height < height){
                        max_height = height;
                        mas_node = elem2.node;
                        mas_level = elem2.level;
                        q = q+1;
                    }
                }
            });
            mas_otbor[q] = {
                "level":mas_level,
                "node":mas_node,
            };
        });

        $.each(mas_otbor, function (j, elem) {
            //находим DOM элемент node (идентификатор div node)
            var div_node_id = document.getElementById('node_'+ elem.node);
            var div_level_id = document.getElementById('level_description_'+ elem.level);
            var height_node = div_node_id.clientHeight;
            var h = div_node_id.offsetTop;
            var height = height_node + h;
            div_level_id.style.height = height + 5 + 'px';
        });
    };


    $(document).on('mousemove', '.div-event', function() {
        var id_node = $(this).attr('id');
        mousemoveNode(id_node);
        //------------------------------------------
        // Обновление формы редактора
        instance.repaintEverything();
    });


    $(document).on('mousemove', '.div-mechanism', function() {
        var id_node = $(this).attr('id');
        mousemoveNode(id_node);
        //------------------------------------------
        // Обновление формы редактора
        instance.repaintEverything();
    });


    // редактирование события
    $(document).on('dblclick', '.div-event', function() {
        var node = $(this).attr('id');
        node_id_on_click = parseInt(node.match(/\d+/));

        var div_node = document.getElementById(node);

        var level = div_node.offsetParent.getAttribute('id');
        level_id_on_click = parseInt(level.match(/\d+/));

        var alert = document.getElementById('alert_event_level_id');
        alert.style = style="display:none;";

        //если событие инициирующее
        if(div_node.getAttribute("class").search("div-initial-event") >= 0){
            $.each(mas_data_node, function (i, elem) {
                if (elem.id == node_id_on_click){
                    document.forms["edit-event-form"].reset();
                    document.forms["edit-event-form"].elements["Node[name]"].value = elem.name;
                    document.forms["edit-event-form"].elements["Node[description]"].value = elem.description;
                    document.forms["edit-event-form"].elements["Node[level_id]"].value = level_id_on_click;
                    //блокировка изменения левела
                    document.forms["edit-event-form"].elements["Node[level_id]"].style.display = "none";

                    document.getElementById('label_level').style.display = "none";

                    $("#editEventModalForm").modal("show");
                }
            });
        } else {
            $.each(mas_data_node, function (i, elem) {
                if (elem.id == node_id_on_click){
                    document.forms["edit-event-form"].reset();
                    document.forms["edit-event-form"].elements["Node[name]"].value = elem.name;
                    document.forms["edit-event-form"].elements["Node[description]"].value = elem.description;
                    document.forms["edit-event-form"].elements["Node[level_id]"].value = level_id_on_click;
                    //разблокировка изменения левела
                    document.forms["edit-event-form"].elements["Node[level_id]"].style.display = "";

                    document.getElementById('label_level').style.display = "";

                    $("#editEventModalForm").modal("show");
                }
            });
        }
    });


    // редактирование механизма
    $(document).on('dblclick', '.div-mechanism', function() {
        var node = $(this).attr('id');
        node_id_on_click = parseInt(node.match(/\d+/));

        var div_node = document.getElementById(node);

        var level = div_node.offsetParent.getAttribute('id');
        level_id_on_click = parseInt(level.match(/\d+/));

        var alert = document.getElementById('alert_mechanism_level_id');
        alert.style = style="display:none;";

        $.each(mas_data_node, function (i, elem) {
            if (elem.id == node_id_on_click){
                document.forms["edit-mechanism-form"].reset();
                document.forms["edit-mechanism-form"].elements["Node[name]"].value = elem.name;
                document.forms["edit-mechanism-form"].elements["Node[description]"].value = elem.description;
                document.forms["edit-mechanism-form"].elements["Node[level_id]"].value = level_id_on_click;
                //разблокировка изменения левела
                document.forms["edit-mechanism-form"].elements["Node[level_id]"].style.display = "";

                $("#editMechanismModalForm").modal("show");
            }
        });
    });


    // редактирование уровня
    $(document).on('dblclick', '.div-level-name', function() {
        level_id_on_click = parseInt($(this).attr('id').match(/\d+/));
        $.each(mas_data_level, function (i, elem) {
            if (elem.id_level == level_id_on_click){
                document.forms["edit-level-form"].reset();
                document.forms["edit-level-form"].elements["Level[name]"].value = elem.name;
                document.forms["edit-level-form"].elements["Level[description]"].value = elem.description;

                $("#editLevelModalForm").modal("show");
            }
        });
    });


    // удаление события и механизмов
    $(document).on('click', '.del', function() {
        var del = $(this).attr('id');
        node_id_on_click = parseInt(del.match(/\d+/));
        //console.log(node_id_on_click);
        var node_class = document.getElementById('node_' + node_id_on_click).getAttribute('class');
        if (node_class.search("event") >= 0){
            //console.log("событие");
            $("#deleteEventModalForm").modal("show");
        } else if (node_class.search("mechanism") >= 0){
            //console.log("механизм");
            $("#deleteMechanismModalForm").modal("show");
        }
    });
</script>


<div class="tree-diagram-visual-diagram">
    <h1><?= Html::encode($this->title) ?></h1>
</div>

<div class="visual-diagram col-md-12">
<div id="visual_diagram_field" class="visual-diagram-top-layer">
    <div id="top_layer" class="top">
            <!-- Вывод уровней -->
            <!-- Вывод начального уровня -->
            <?php foreach ($level_model_all as $value): ?>
            <?php if ($value->parent_level == null){ ?>
                <div id="level_<?= $value->id ?>" class="div-level">
                    <div class="div-level-name" id="level_name_<?= $value->id ?>"><div title="<?= $value->name ?>"><?= $value->name ?></div></div>
                    <div class="div-level-description" id="level_description_<?= $value->id ?>">
                        <!--?= $level_value->description ?>-->
                        <!-- Вывод инициирующего события -->
                        <?php foreach ($initial_event_model_all as $initial_event_value): ?>
                            <div id="node_<?= $initial_event_value->id ?>" class="div-event node div-initial-event">
                                <div class="ep"></div>
                                <div id="node_del_<?= $initial_event_value->id ?>" class="del del-event"></div>
                                <div id="node_name_<?= $initial_event_value->id ?>" class="div-event-name"><?= $initial_event_value->name ?></div>
                            </div>
                        <?php endforeach; ?>

                        <?php foreach ($sequence_model_all as $sequence_value): ?>
                            <?php if ($sequence_value->level == $value->id){ ?>
                                <?php $event_id = $sequence_value->node; ?>
                                <?php foreach ($event_model_all as $event_value): ?>
                                    <?php if ($event_value->id == $event_id){ ?>
                                        <div id="node_<?= $event_value->id ?>" class="div-event node">
                                            <div class="ep"></div>
                                            <div id="node_del_<?= $event_value->id ?>" class="del del-event"></div>
                                            <div id="node_name_<?= $event_value->id ?>" class="div-event-name"><?= $event_value->name ?></div>
                                        </div>
                                    <?php } ?>
                                <?php endforeach; ?>
                            <?php } ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php $a = $value->id; }?>
            <?php endforeach; ?>
            <!-- Вывод остальных уровней -->
            <?php if ($level_model_count > 1){ ?>
            <?php $i = 1; ?>
            <?php do { ?>
                <?php foreach ($level_model_all as $level_value): ?>
                    <?php if ($level_value->parent_level == $a){ ?>
                        <div id="level_<?= $level_value->id ?>" class="div-level">
                            <div class="div-level-name" id="level_name_<?= $level_value->id ?>"><div title="<?= $level_value->name ?>"><?= $level_value->name ?></div></div>
                            <div class="div-level-description" id="level_description_<?= $level_value->id ?>">
                                <!--?= $level_value->description ?>-->
                                <?php foreach ($sequence_model_all as $sequence_value): ?>
                                    <?php if ($sequence_value->level == $level_value->id){ ?>
                                        <?php $node_id = $sequence_value->node; ?>
                                        <!-- Вывод механизма -->
                                        <?php foreach ($mechanism_model_all as $mechanism_value): ?>
                                            <?php if ($mechanism_value->id == $node_id){ ?>
                                                <div id="node_<?= $mechanism_value->id ?>"
                                                    class="div-mechanism node" title="<?= $mechanism_value->name ?>">
                                                    <div class="ep"></div>
                                                    <div id="node_del_<?= $mechanism_value->id ?>" class="del del-mechanism"></div>
                                                    <div class="div-mechanism-m">M</div>
                                                </div>
                                            <?php } ?>
                                        <?php endforeach; ?>
                                        <!-- Вывод событий -->
                                        <?php foreach ($event_model_all as $event_value): ?>
                                            <?php if ($event_value->id == $node_id){ ?>
                                                <div id="node_<?= $event_value->id ?>" class="div-event node">
                                                    <div class="ep"></div>
                                                    <div id="node_del_<?= $event_value->id ?>" class="del del-event"></div>
                                                    <div id="node_name_<?= $event_value->id ?>" class="div-event-name"><?= $event_value->name ?></div>
                                                </div>
                                            <?php } ?>
                                        <?php endforeach; ?>
                                    <?php } ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <?php $a = $level_value->id; ?>
                        <?php break 1; ?>
                    <?php } ?>
                <?php endforeach; ?>
                <?php $i = $i + 1; ?>
            <?php } while ($i <> $level_model_count); ?>
        <?php } ?>
    </div>
</div>
</div>