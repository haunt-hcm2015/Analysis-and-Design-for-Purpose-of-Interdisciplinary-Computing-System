# -*- coding: utf-8 -*-
# from odoo import http


# class Payroll-management(http.Controller):
#     @http.route('/payroll-management/payroll-management/', auth='public')
#     def index(self, **kw):
#         return "Hello, world"

#     @http.route('/payroll-management/payroll-management/objects/', auth='public')
#     def list(self, **kw):
#         return http.request.render('payroll-management.listing', {
#             'root': '/payroll-management/payroll-management',
#             'objects': http.request.env['payroll-management.payroll-management'].search([]),
#         })

#     @http.route('/payroll-management/payroll-management/objects/<model("payroll-management.payroll-management"):obj>/', auth='public')
#     def object(self, obj, **kw):
#         return http.request.render('payroll-management.object', {
#             'object': obj
#         })
