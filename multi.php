<script type="text/javascript">
// I woild like to create a miltidimentional array as follows
// 	var multiarr = 	[
// 					["A,2,5"], 
// 					["B,4,4"], 
// 					["C,4,4"]
// 				]
// from string values gotten from the database using ajax.

// // string data gotten from db
// // delimited by #
// 	var string = "A,2,5# B,4,4# C,4,4";

// // I split the string by the # delimiter
// 	arr1=string.split(/\s*\#\s*/g);
// // creating the array below
// 	var arr = ["A,2,5", "B,4,4", "C,4,4"];

// // i want to further split the items in the above array
// // by the , delimiter and create a multidimentional array
// // * problem is the loop only pushes in the last item in the array
// 	for (i = 0; i < arr.length; i++) {  
//         var arr2 = [];
// 		arr2[i]=arr2.push(arr1[i].split(/\s*\,\s*/g));
// 	}

// 	console.log(arr2);

// What am i doing wrong?
// or what can i do better?



var string = "A,2,5# B,4,4# C,4,4";

var res = JSON.parse("[[" + string.trim()
      .replace(/\s/g, "")
      .replace(/#/g, "],[")
      .replace(/([^,\]\[])/g, "\"$1\"") + "]]"
    );

console.log(res)


var multiArray = string.split(/\s*\#\s*/g).map(function(substr) {
  return [substr];
});

console.log(multiArray);

// base string
var str = "A,2,5# B,4,4# C,4,4";

// quote text data. If the array was plain number data, we don't even need this step.
var quoted = str.replace(/([a-zA-Z]+)/g,'"$1"');

// rewrite to JSON form for a nested array
var jsonStr = "[[" + quoted.replace(/#/g,'],[') + "]]";

// done, just tell the JSON parser to do what it needs to do.
var arr = JSON.parse(jsonStr);

console.log(arr);

</script>