# -*- coding: utf-8 -*-
# from odoo import http


# class Corporate-governance(http.Controller):
#     @http.route('/corporate-governance/corporate-governance/', auth='public')
#     def index(self, **kw):
#         return "Hello, world"

#     @http.route('/corporate-governance/corporate-governance/objects/', auth='public')
#     def list(self, **kw):
#         return http.request.render('corporate-governance.listing', {
#             'root': '/corporate-governance/corporate-governance',
#             'objects': http.request.env['corporate-governance.corporate-governance'].search([]),
#         })

#     @http.route('/corporate-governance/corporate-governance/objects/<model("corporate-governance.corporate-governance"):obj>/', auth='public')
#     def object(self, obj, **kw):
#         return http.request.render('corporate-governance.object', {
#             'object': obj
#         })
