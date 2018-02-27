$.validator.setDefaults({
	highlight: function(e) {
		$(e).closest(".form-group").removeClass("has-success").addClass("has-error")
	},
	success: function(e) {
		e.closest(".form-group").removeClass("has-error").addClass("has-success")
	},
	errorElement: "span",
	errorPlacement: function(e, r) {
		e.appendTo(r.is(":radio") || r.is(":checkbox") ? r.parent().parent().parent() : r.parent())
	},
	errorClass: "help-block m-b-none",
	validClass: "help-block m-b-none"
}), $().ready(function() {
	$("#commentForm").validate();
	var e = "<i class='fa fa-times-circle'></i> ";
	$("#signupForm").validate({
		rules: {

			name:"required",

		},
		messages: {
			
			name: e + "请输入角色名称",

		}
	}), $("#username").focus(function() {
		var e = $("#firstname").val(),
			r = $("#lastname").val();
		e && r && !this.value && (this.value = e + "." + r)
	})
});