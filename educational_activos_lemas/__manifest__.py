# -*- coding: utf-8 -*-
{
    'name': "Educational Inventory (Lemas)",

    'summary': """
        Manejo de inventario de bienes e inmuebles""",

    'description': """
        Módulo encargado de llevar el registro de bienes e inmuebles de la unidad educativa.
    """,

    'author': "Ing. Cristhian Carreño",
    'website': "http://www.webhosting.ml",

    'category': 'Education',
    'version': '1.0',

    'depends': ['base', 'om_account_asset'],

    'data': [
        # 'security/ir.model.access.csv',
        'views/view_activos.xml',
        #'views/view_res_partner.xml',
    ],
}