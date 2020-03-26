# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Report(models.Model):
    _name = 'accounting.report'
    _description = 'Accounting Repor Model'
    report_type_id = fields.Many2one('accounting.report.type',string='Report Type')
class ReportType(models.Model):
    _name = 'accounting.report.type'
    _description = 'Accounting Report Type Model'
class FinancialAnalysisReport(models.Model):
    _name = 'accounting.financial.analysis.report'
    _description = 'Accounting Financial Analysis Model'
class FinancialAnalysisDetail(models.Model):
    _name = 'accounting.financial.analysis.detail'
    _description = 'Accounting Financial Analysis Detail Model'
class CompareOpponentReport(models.Model):
    _name = 'accounting.compare.opponent.report'
    _description = 'Accounting Compare Opponent Report Model'
class CompareOpponentDetail(models.Model):
    _name = 'accounting.compare.opponent.detail'
    _description = 'Accounting Compare Opponent Detail Model'
