# -*- coding: utf-8 -*-
# from odoo import http


# class corporate_governance(http.Controller):
#     @http.route('/corporate_governance/corporate_governance/', auth='public')
#     def index(self, **kw):
#         return "Hello, world"

#     @http.route('/corporate_governance/corporate_governance/objects/', auth='public')
#     def list(self, **kw):
#         return http.request.render('corporate_governance.listing', {
#             'root': '/corporate_governance/corporate_governance',
#             'objects': http.request.env['corporate_governance.corporate_governance'].search([]),
#         })

#     @http.route('/corporate_governance/corporate_governance/objects/<model("corporate_governance.corporate_governance"):obj>/', auth='public')
#     def object(self, obj, **kw):
#         return http.request.render('corporate_governance.object', {
#             'object': obj
#         })
