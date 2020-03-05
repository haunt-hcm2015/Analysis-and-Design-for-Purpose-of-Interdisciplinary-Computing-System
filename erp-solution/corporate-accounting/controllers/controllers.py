# -*- coding: utf-8 -*-
# from odoo import http


# class Corporate-accounting(http.Controller):
#     @http.route('/corporate-accounting/corporate-accounting/', auth='public')
#     def index(self, **kw):
#         return "Hello, world"

#     @http.route('/corporate-accounting/corporate-accounting/objects/', auth='public')
#     def list(self, **kw):
#         return http.request.render('corporate-accounting.listing', {
#             'root': '/corporate-accounting/corporate-accounting',
#             'objects': http.request.env['corporate-accounting.corporate-accounting'].search([]),
#         })

#     @http.route('/corporate-accounting/corporate-accounting/objects/<model("corporate-accounting.corporate-accounting"):obj>/', auth='public')
#     def object(self, obj, **kw):
#         return http.request.render('corporate-accounting.object', {
#             'object': obj
#         })
