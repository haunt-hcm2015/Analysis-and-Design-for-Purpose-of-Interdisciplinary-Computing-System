# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class AdminReportDetail(models.Model):
    _name = 'accounting.admin.report.detail'
    _description = 'Accounting Admin Report Model'
    report_by_id = fields.Many2one('hr.employee', string='Report by')
    admin_report_id = fields.Many2one('accounting.admin.report', string = 'Admin Report')
