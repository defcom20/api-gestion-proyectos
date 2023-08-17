TypeState:
'name' => $this->faker->randomElement([
    'Inicial',
    'En Progreso',
    'Revisión',
    'Aprobado',
    'Rechazado',
    'Completado',
    'Pendiente',
    'Archivado',
    'Cancelado',
    'En Espera',
    'Postergado',
    'En Análisis',
    'En Pruebas',
    'Desplegado',
    'Cerrado'
]),

Category:

'name' => $this->faker->randomElement([
    'Desarrollo',
    'Diseño',
    'Marketing',
    'Soporte',
    'Investigación',
    'Pruebas',
    'Gestión de Proyectos',
    'Documentación',
    'Análisis',
    'Finanzas',
    'Recursos Humanos',
    'Administración',
    'Compras',
    'Legal',
    'Ventas'
]),

Priority:

'name' => $this->faker->randomElement([
    'Baja',
    'Media',
    'Alta',
    'Crítica',
    'Urgente'
]),

Role:

'name' => $this->faker->randomElement([
    'Administrador',
    'Gerente',
    'Desarrollador',
    'Diseñador',
    'Analista',
    'Tester',
    'Soporte Técnico',
    'Marketing',
    'Ventas',
    'Cliente',
    'Usuario Invitado',
    'Operador',
    'Supervisor',
    'Consultor',
    'Ejecutivo'
]),


Task:


'description' => $this->faker->randomElement([
    'Desarrollar la función de inicio de sesión',
    'Diseñar la página de inicio',
    'Realizar pruebas en el módulo de registro',
    'Actualizar la documentación del API',
    'Revisar el rendimiento de la base de datos',
    'Optimizar las imágenes del sitio web',
    'Implementar la función de recuperación de contraseña',
    'Corregir errores en la página de perfil',
    'Añadir validación en el formulario de contacto',
    'Investigar nuevas tecnologías para el frontend',
    'Preparar presentación para los stakeholders',
    'Planificar la próxima reunión de equipo',
    'Revisar y responder correos de soporte',
    'Realizar una auditoría de seguridad',
    'Crear una estrategia de marketing para el próximo trimestre'
]),

Proyect:

'name' => $this->faker->randomElement([
        'E-Shop Proyecto',
        'Blogging Central',
        'MobiHealth App',
        'TaskMaster Sistema',
        'NewsHub Portal',
        'PetSocial Red',
        'FinAnalyzer Herramienta',
        'MindfulApp Meditación',
        'BookMeNow Reservas',
        'EduOnline Plataforma',
    ]),
'description' => $this->faker->randomElement([
        'Plataforma de E-commerce',
        'Sitio Web de Blogging',
        'Aplicación Móvil de Salud',
        'Sistema de Gestión de Proyectos',
        'Portal de Noticias',
        'Red Social para Mascotas',
        'Herramienta de Análisis Financiero',
        'App de Meditación y Bienestar',
        'Sistema de Reservas en Línea',
        'Plataforma de Aprendizaje en Línea',
    ]),

Member:

return [
    'name' => $this->faker->firstName,
    'lastname' => $this->faker->lastName,
    'type_state_id' => TypeState::factory(), // Asegúrate de tener una fábrica o seeder para TypeState
];



