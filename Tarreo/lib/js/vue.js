

new Vue({
    el: 'main',
    data: {
        correo: '',
        curso: '',
        rol: '',
        nombres: '',
        apellidos: '',
        rut: '',
        taller: '',
        numTotal: [],
        menTotal: [],
        total: [],
        men: ''

    },
    created: function () {
        this.getTotal();
        this.getTotalMensajes();
    },
    mounted: function () {},
    methods: {
        iniciar: function () {
            url = "http://127.0.0.1/Libreta/index.php/sesion";
            param = new FormData();
            param.append("correo", this.correo);
            param.append("clave", this.clave);
            axios.post(url, param)
                    .then(res => {
                        o = res.data;
                        if (o.msg == "administrador") {
                            window.location.href = 'http://127.0.0.1/Libreta/index.php/Administrador';
                        } else if (o.msg == "profesor") {
                            window.location.href = 'http://127.0.0.1/Libreta/index.php/Profesor';
                        } else if (o.msg == "apoderado") {
                            window.location.href = 'http://127.0.0.1/Libreta/index.php/Apoderado';
                        } else if (o.msg == "alumno") {
                            window.location.href = 'http://127.0.0.1/Libreta/index.php/Alumno';
                        } else if (o.msg == "2") {
                            $.notify({
                                icon: "lib/img/warning.png",
                                message: "<strong>Ingrese los datos pedidos</strong> "
                            }, {
                                icon_type: 'image',
                                type: "warning"
                            });
                        } else if (o.msg == "1") {
                            $.notify({
                                icon: "lib/img/negativo2.png",
                                message: "<strong>Error al ingresar al sistema, intentelo nuevamente</strong>"
                            }, {
                                icon_type: 'image',
                                type: "danger"
                            });
                        } else if (o.msg == "error") {
                            $.notify({
                                icon: "lib/img/negativo2.png",
                                message: "<strong>Cuenta Inhabilitada</strong>"
                            }, {
                                icon_type: 'image',
                                type: "danger"
                            });
                        }
                    })
                    .catch(error => {
                        console.log(error);
                    });
        },
        cerrar: function () {
            url = "http://127.0.0.1/Libreta/index.php/cerrar";
            axios.post(url)
                    .then(res => {
                        window.location.href = 'http://127.0.0.1/Libreta/index.php';
                    });

        }, insertarUsuario: function () {
            url = "http://127.0.0.1/Libreta/index.php/validarRut";
            param = new FormData();
            param.append("rut", this.rut);
            axios.post(url, param)
                    .then(res => {
                        o = res.data;
                        var resultado;
                        for (var key in o.msg) {
                            var obj = o.msg[key];
                            for (var prop in obj) {
                                if (obj.hasOwnProperty(prop)) {
                                    resultado = obj[prop];
                                }
                            }
                        }
                        if (resultado == 0) {
                            url = "http://127.0.0.1/Libreta/index.php/insertarUsuario";
                            param = new FormData()
                            param.append("rut", this.rut);
                            param.append("nombres", this.nombres);
                            param.append("apellidos", this.apellidos);
                            param.append("correo", this.correo);
                            param.append("curso", this.curso);
                            param.append("rol", this.rol);
                            param.append("taller", this.taller);
                            axios.post(url, param)
                                    .then(res => {
                                        o = res.data;
                                        if (o.msg == "ok") {
                                            $.notify({
                                                icon: "../lib/img/tick2.png",
                                                message: "<strong>Usuario Registrado con Exito!!!</strong> "
                                            }, {
                                                icon_type: 'image',
                                                type: "success"
                                            });
                                        } else if (o.msg == "null") {
                                            $.notify({
                                                icon: "../lib/img/warning.png",
                                                message: "<strong>Ingrese los datos pedidos</strong> "
                                            }, {
                                                icon_type: 'image',
                                                type: "warning"
                                            });
                                        } else {
                                            $.notify({
                                                icon: "../lib/img/no.png",
                                                message: "<strong>Error al ingresar al sistema, intentelo nuevamente</strong>"
                                            }, {
                                                icon_type: 'image',
                                                type: "danger"
                                            });
                                        }
                                    })
                                    .catch(error => {
                                        console.log(error);
                                    });
                        } else if (resultado > 0) {
                            $.notify({
                                icon: "../lib/img/no.png",
                                message: "<strong>Rut ya Registrado!!!</strong>"
                            }, {
                                icon_type: 'image',
                                type: "danger"
                            });
                        }
                    })
                    .catch(error => {
                        console.log(error);
                    });

        }, getTotal: function () {
            url = "http://127.0.0.1/Libreta/index.php/numeroRegistrados";
            axios.post(url)
                    .then(res => {
                        this.numTotal = res.data;
                    })
                    .catch(error => {
                        console.log(error);
                    });
        }, getTotalMensajes: function () {
            url = "http://127.0.0.1/Libreta/index.php/mensajesEnviados";
            axios.post(url)
                    .then(res => {
                        this.menTotal = res.data;
                    })
                    .catch(error => {
                        console.log(error);
                    });
        }
    }
});


