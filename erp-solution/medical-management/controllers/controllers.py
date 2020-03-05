# -*- coding: utf-8 -*-
# from odoo import http


# class Medical-management(http.Controller):
#     @http.route('/medical-management/medical-management/', auth='public')
#     def index(self, **kw):
#         return "Hello, world"

#     @http.route('/medical-management/medical-management/objects/', auth='public')
#     def list(self, **kw):
#         return http.request.render('medical-management.listing', {
#             'root': '/medical-management/medical-management',
#             'objects': http.request.env['medical-management.medical-management'].search([]),
#         })

#     @http.route('/medical-management/medical-management/objects/<model("medical-management.medical-management"):obj>/', auth='public')
#     def object(self, obj, **kw):
#         return http.request.render('medical-management.object', {
#             'object': obj
#         })
