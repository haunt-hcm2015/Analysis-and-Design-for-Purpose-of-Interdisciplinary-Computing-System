# -*- coding: utf-8 -*-
# from odoo import http


# class fashion_store_management(http.Controller):
#     @http.route('/fashion_store_management/fashion_store_management/', auth='public')
#     def index(self, **kw):
#         return "Hello, world"

#     @http.route('/fashion_store_management/fashion_store_management/objects/', auth='public')
#     def list(self, **kw):
#         return http.request.render('fashion_store_management.listing', {
#             'root': '/fashion_store_management/fashion_store_management',
#             'objects': http.request.env['fashion_store_management.fashion_store_management'].search([]),
#         })

#     @http.route('/fashion_store_management/fashion_store_management/objects/<model("fashion_store_management.fashion_store_management"):obj>/', auth='public')
#     def object(self, obj, **kw):
#         return http.request.render('fashion_store_management.object', {
#             'object': obj
#         })
