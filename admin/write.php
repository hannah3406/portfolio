<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfoilo</title>
    <script type="text/javascript" src="./smart2/js/HuskyEZCreator.js" charset="utf-8"></script>
</head>
<body>
    <?php
        include_once "db.php";
        $title='';
        $thum='';
        $contents='';
        $mode = 'insert';

        if( isset($_GET['mode']) ){
            $mode = $_GET['mode'];
            $num = $_GET['num'];
            $query = "SELECT * FROM admin1 WHERE num='$num'";
            $result = mysqli_query($connect,$query);
            $row = mysqli_fetch_array($result);        

            $title = $row['title'];
            $thum=$row['thum'];
            $contents=$row['contents'];
        }

    ?>

    <form action="res.php" method="post" enctype="multipart/form-data">
        <h2>PORTFOLIO</h2>
        <table>
            <tr>
                <th>제목</th>
                <td><input type="text" name="title" value="<?=$title?>"></td>
            </tr>
            <tr>
                <th>썸네일</th>
                <td><input type="file" name="thum" class="thum"><?=$thum?></td>
            </tr>
            <tr>
                <th>상세내용</th>
                <td><textarea name="contents" id="ir1"><?=$contents?></textarea></td>
            </tr>
            <tr>
                <th class="noneStyle"></th>
                <td class="noneStyle"><input type="submit" value="저장하기" class="submit1" ></td>
            </tr>
        </table>
        <input type="hidden" name="mode" value='<?=$mode?>'>
        <input type="hidden" name="num" value="<?=$num?>">
    </form>


    <script type="text/javascript">
        const btnSubmit = document.querySelector('input[type=submit]');
        btnSubmit.onclick = function(e){
            e.preventDefault();
            submitContents(this);
        }

        var oEditors = [];
        nhn.husky.EZCreator.createInIFrame({
            oAppRef: oEditors,
            elPlaceHolder: "ir1",
            sSkinURI: "smart2/SmartEditor2Skin.html",	
            htParams : {
                bUseToolbar : true,				// 툴바 사용 여부 (true:사용/ false:사용하지 않음)
                bUseVerticalResizer : true,		// 입력창 크기 조절바 사용 여부 (true:사용/ false:사용하지 않음)
                bUseModeChanger : true,			// 모드 탭(Editor | HTML | TEXT) 사용 여부 (true:사용/ false:사용하지 않음)
                //bSkipXssFilter : true,		// client-side xss filter 무시 여부 (true:사용하지 않음 / 그외:사용)
                //aAdditionalFontList : aAdditionalFontSet,		// 추가 글꼴 목록
                fOnBeforeUnload : function(){
                    //alert("완료!");
                }
            }, //boolean
            fOnAppLoad : function(){
                //예제 코드
                //oEditors.getById["ir1"].exec("PASTE_HTML", ["로딩이 완료된 후에 본문에 삽입되는 text입니다."]);
            },
            fCreator: "createSEditor2"
        });

        function submitContents(elClickedObj) {
            oEditors.getById["ir1"].exec("UPDATE_CONTENTS_FIELD", []);	// 에디터의 내용이 textarea에 적용됩니다.
            // 에디터의 내용에 대한 값 검증은 이곳에서 document.getElementById("ir1").value를 이용해서 처리하면 됩니다.
            
            try {
                elClickedObj.form.submit();
            } catch(e) {}
        }
</script>
<!-- <script>history.back()</script> -->

    <style>
        *{font-family:noto Sans KR; }
        body{background-color:#fff;color:#2E4559;}
        h2{width:80%; margin:30px auto; text-align:center;}
        table{border-collapse:collapse; width:80%; margin:30px auto;}
        th,td{
            padding:15px;
            border:0px solid #2E4559;;
            border-width:1px 0 1px;
        }

        caption{
            background-color:#000;
            color:#fff; font-size:2em; padding:10px;
        }
        th{background-color:#A9D0D9; width:150px; color:#2E4559;}
        textarea{width:800px; height:300px;}
        td{width:800px;}
        .noneStyle{
            border:none;
            background-color:#2E4559;
            text-align:right;
        }
        *{box-sizing: border-box;}
    </style>
</body>
</html>