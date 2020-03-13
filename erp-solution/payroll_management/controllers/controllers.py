# -*- coding: utf-8 -*-
# from odoo import http


# class payroll_management(http.Controller):
#     @http.route('/payroll_management/payroll_management/', auth='public')
#     def index(self, **kw):
#         return "Hello, world"

#     @http.route('/payroll_management/payroll_management/objects/', auth='public')
#     def list(self, **kw):
#         return http.request.render('payroll_management.listing', {
#             'root': '/payroll_management/payroll_management',
#             'objects': http.request.env['payroll_management.payroll_management'].search([]),
#         })

#     @http.route('/payroll_management/payroll_management/objects/<model("payroll_management.payroll_management"):obj>/', auth='public')
#     def object(self, obj, **kw):
#         return http.request.render('payroll_management.object', {
#             'object': obj
#         })
