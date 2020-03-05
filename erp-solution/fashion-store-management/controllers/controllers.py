# -*- coding: utf-8 -*-
# from odoo import http


# class Fashion-store-management(http.Controller):
#     @http.route('/fashion-store-management/fashion-store-management/', auth='public')
#     def index(self, **kw):
#         return "Hello, world"

#     @http.route('/fashion-store-management/fashion-store-management/objects/', auth='public')
#     def list(self, **kw):
#         return http.request.render('fashion-store-management.listing', {
#             'root': '/fashion-store-management/fashion-store-management',
#             'objects': http.request.env['fashion-store-management.fashion-store-management'].search([]),
#         })

#     @http.route('/fashion-store-management/fashion-store-management/objects/<model("fashion-store-management.fashion-store-management"):obj>/', auth='public')
#     def object(self, obj, **kw):
#         return http.request.render('fashion-store-management.object', {
#             'object': obj
#         })
