# -*- coding: utf-8 -*-

# from odoo import models, fields, api


# class corporate_governance(models.Model):
#     _name = 'corporate_governance.corporate_governance'
#     _description = 'corporate_governance.corporate_governance'

#     name = fields.Char()
#     value = fields.Integer()
#     value2 = fields.Float(compute="_value_pc", store=True)
#     description = fields.Text()
#
#     @api.depends('value')
#     def _value_pc(self):
#         for record in self:
#             record.value2 = float(record.value) / 100
